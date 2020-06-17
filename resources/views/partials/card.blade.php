<div class="my-1">
    <div class="bg-primary overflow-hidden rounded-md shadow-md @isset($class) {{$class}} @endisset">
        @if(isset($cardHeader))
            {{$cardHeader}}
        @elseif(isset($cardTitle))
        <div class="flex p-4 border-b border-gray-300">
            <h3 class="flex text-lg leading-6 font-medium text-primary   ">
            {{$cardTitle}}
            </h3>
        </div>
        @endif
        <div class="px-4 py-5 sm:px-6">
            {{$slot}}
        </div>
    </div>
</div>
