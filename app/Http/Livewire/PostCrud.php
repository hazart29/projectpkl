<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class PostCrud extends Component
{
    public $postid, $title, $content, $image, $status;
    public $newPost = false, $deleted= false;
    use WithPagination;
    use WithFileUploads;

    public function render()
    {
        return view('livewire.post-crud', ['posts' => Post::latest()->paginate(3)]);
    }

    public function saved()
    {
        $this->store();
    }

    public function newPosting()
    {
        $this->newPost = true;
    }

    public function deleting()
    {
        $this->deleted = true;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|max:3072',
        ]);

        $name = md5($this->image . microtime()).'.'.$this->image->extension();

        $post = Post::updateOrCreate(['id' => $this->postid], [
            'title' => $this->title,
            'content' => $this->content,
            'image' => $name,
            'status' => 'posted',
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
        ]);

        $this->image->storeAs('photos', $name);

        session()->flash('message', 'Content Published, Check it Now!.');
        return redirect()->route('post');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->id = $id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->image = $post->image;

        $this->openModal();
    }

    public function delete($id)
    {
        $data = Post::findOrFail($id);

        $file_path = public_path().'/storage/photos/'.$data->image;
        unlink($file_path);

        $data->delete();

        session()->flash('message', 'Post Has Been Deleted!');
        return redirect()->route('post');
    }
}
