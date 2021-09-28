<ul role="button" class="-my-6 divide-y-2 divide-gray-200">
    @forelse($listpost as $row)
    <li class="py-5 flex ">
        <div class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
            <img src="{{ asset('/storage/photos/'.$row->image) }}" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="w-full h-full object-center object-cover">
        </div>

        <div class="ml-4 flex-1 flex flex-col">
            <div>
                <div class="flex text-base w-full font-medium text-gray-900">
                    <div>
                        <h3>
                            <a href="#">
                                {{ $row->title }}
                            </a>
                        </h3>
                    </div>
                    <div class="flex-auto text-right">
                        <p class="ml-4 text-sm text-gray-500">
                            views : 0
                        </p>
                        <p class="ml-4 text-sm text-gray-500">
                            comment : 0
                        </p>
                    </div>
                </div>
                <p class="mb-1 text-sm w-3/4 text-gray-500">
                    {{ substr($row->content, 0, 100).'. . .' }}
                </p>
            </div>
            <div class="flex-1 flex items-end justify-between text-sm">
                <p class="text-gray-500">
                    {{ $row->created_at }}
                </p>

                <div class="flex">
                    <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">Detail></button>
                </div>
            </div>
        </div>
    </li>
    @empty
    <li class="py-6">This web is empty!, tell admin to upload something!</li>
    @endforelse
    <li class="py-5 flex ">
        <div class=" w-full">
        {{ $listpost->links() }} 
        </div>
    </li>
</ul>