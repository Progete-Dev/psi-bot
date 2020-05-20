
<div class="container my-4">
    <div class="bg-white shadow overflow-hidden  rounded">
        <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-indigo-600">
             {{$cardTitle}}
            </h3>
            <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
            {{-- Personal details and application. --}}
            </p>
        </div>
        <div class="px-4 py-5 sm:px-6">
            {{$slot}}
        </div>
    </div>

</div>
