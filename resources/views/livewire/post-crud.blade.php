<div class="fixed md:bottom-10 md:right-10 bottom-5 right-5">
    <button class="inline-flex items-center p-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" wire:click="newPosting">
        New Post
    </button>

    <div class="">
        <!-- New Post Modal -->
        <x-jet-dialog-modal wire:model="newPost">
            <x-slot name="title">
                {{ __('Posting News') }}
            </x-slot>

            <x-slot name="content">
                <div>
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus autocomplete="title" wire:model="title" />
                </div>
                <div>
                    <x-jet-label for="content" value="{{ __('Content') }}" />
                    <textarea name="content" required autofocus autocomplete="content" wire:model="content" id="content" cols="30" rows="10" class="block mt-1 bg-gray-100 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                </div>
                <div>
                    <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                        <x-jet-label for="image" value="{{ __('Image') }}" />
                        <x-jet-input type="file" name="image" required autofocus autocomplete="image" wire:model="image" id="image" cols="30" rows="10" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" />
                        <div x-show="isUploading" class="">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-button wire:click="store()" wire:loading.attr="enabled">
                    {{ __('Post') }}
                </x-jet-button>

                <x-jet-button wire:click="$toggle('newPost')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="py-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="md:py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="w-full w-full overflow-x">
                <thead class="bg-gray-100">
                    <tr class="">
                        <th scope="col" class="md:px-6 md:py-3 p-2 md:text-left text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Uploader
                        </th>
                        <th scope="col" class="md:px-6 md:py-3 p-2 md:text-left text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title
                        </th>
                        <th scope="col" class="md:px-6 md:py-3 p-2 md:text-left text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="md:px-6 md:py-3 p-2 md:text-left text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date
                        </th>
                        <th scope="col" class="relative md:px-6 md:py-3 p-2">
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 md:text-xl text-xs">
                    @forelse($posts as $row)
                    <tr class="">
                        <td class="md:px-6 md:py-4 p-2 whitespace-normal">
                            <div class=" items-center">
                                <div class="md:ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $row->name }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ substr($row->email, 0, 5).'. . .' }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="md:px-6 md:py-4 p-2 whitespace-normal">
                            <div class="flex items-center">
                                <div class="md:ml-4">
                                    <div class="text-sm text-gray-900">{{ $row->title }}</div>
                                    <div class="text-sm text-gray-500">{{ substr($row->content, 0, 10).'. . .' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="md:px-6 md:py-4 p-2 whitespace-normal">
                            <span class="px-2 text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{ $row->status }}
                            </span>
                        </td>
                        <td class="md:px-6 md:py-4 p-2 whitespace-normal text-sm text-gray-500">
                            {{ $row->created_at }}
                        </td>
                        <td class="md:px-6 md:py-4 p-2 whitespace-normal text-right text-sm font-medium">
                            <div>
                                <x-jet-danger-button wire:click="delete({{ $row->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="white">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </x-jet-danger-button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="100%" class="px-6 py-4 whitespace-normal text-center">
                            <strong>This field is empty, let's upload something!</strong>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="bg-gray-100 p-2">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
