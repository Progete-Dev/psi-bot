
<div class="container my-4">
    <div class="bg-white shadow overflow-hidden  rounded">
        @if(isset($cardHeader))
            {{$cardHeader}}
        @endif
        <div class="px-4 py-5 sm:px-6">
            {{$slot}}
        </div>
    </div>

</div>
