<div class="my-4">
    <div class="bg-white shadow overflow-hidden  rounded">
        @if(isset($cardHeader))
            {{$cardHeader}}
        @elseif(isset($cardTitle))
        <div class="flex p-4 border-b border-gray-300">
            <h3 class="flex text-lg leading-6 font-medium text-indigo-600">
            {{$cardTitle}}
            </h3>
        </div>
        @endif
        <div class="px-4 py-5 sm:px-6">
            {{$slot}}
        </div>
    </div>
</div>
