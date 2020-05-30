
<div class="container my-4">
    <div class="bg-white shadow overflow-hidden  rounded">
        @if(isset($cardTitle))
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6 flex">
                <h3 class="text-lg leading-6 font-medium text-indigo-600">
                {{ $cardTitle ?? ''}}
                </h3>
                @if(isset($cardHeader))
                    {{$cardHeader}}
                @endif
            </div>
        @endif
        <div class="px-4 py-5 sm:px-6">
            {{$slot}}
        </div>
    </div>

</div>
