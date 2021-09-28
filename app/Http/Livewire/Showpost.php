<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class Showpost extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.showpost', ['listpost' => Post::latest()->paginate(3)]);

    }
}
