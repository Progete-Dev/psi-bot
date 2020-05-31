<div class="flex m-2 bg-indigo-200 rounded-md align-baseline">
    <div class="pl-2 mr-2 mt-1">
        <svg class="fill-current   text-gray-700 w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
        </svg>
    </div>
    <input
        x-model.debounce.500="searchValue"
        class="w-full rounded-md bg-indigo-200 text-gray-700 leading-tight focus:outline-none py-2 px-2"
        id="search" type="text" 
        placeholder="Search">
</div>
<form action="{{$route}}" method="GET">
    <div class="md:flex mx-2 px-2 justify-between">
        <div class="flex ">
            <div class="flex text-gray-400 pt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1 rotate-90" transform="rotate(90)" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="none" fill="currentColor" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5.41 16H18a2 2 0 0 0 2-2 1 1 0 0 1 2 0 4 4 0 0 1-4 4H5.41l2.3 2.3a1 1 0 0 1-1.42 1.4l-4-4a1 1 0 0 1 0-1.4l4-4a1 1 0 1 1 1.42 1.4L5.4 16zM6 8a2 2 0 0 0-2 2 1 1 0 0 1-2 0 4 4 0 0 1 4-4h12.59l-2.3-2.3a1 1 0 1 1 1.42-1.4l4 4a1 1 0 0 1 0 1.4l-4 4a1 1 0 0 1-1.42-1.4L18.6 8H6z"/>
                </svg>
            </div>
            <input type="hidden" name="order" value="{{$order == 'ASC' ? 'DESC' :'ASC' }}">
            @foreach($orderOptions as $option)
        <button name="orderBy" value="{{$option['value']}}" type="submit" class="mx-2 rounded-lg inline-flex items-center {{$option['value'] == $orderBy ? 'bg-gray-200' : 'bg-white' }} hover:text-blue-500 focus:outline-none focus:shadow-outline text-gray-500 font-semibold py-2 px-2 md:px-4">
                <span class="md:text-sm text-xs">{{$option['name']}}</span>
                    
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" width="24" height="24" transform="{{$order == 'ASC' ? 'rotate(180)' : ''}}" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
            </button>
            @endforeach
        </div>
        @if(isset($filterOptions))
        <div class="shadow rounded-lg flex justify-center  align-baseline">
            <div class="relative">
                <button @click.prevent="open = !open" class="px-2 rounded-lg inline-flex items-center bg-white hover:text-blue-500 focus:outline-none focus:shadow-outline text-gray-500 font-semibold py-2 px-2 md:px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 md:hidden" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                        <path d="M5.5 5h13a1 1 0 0 1 0.5 1.5L14 12L14 19L10 16L10 12L5 6.5a1 1 0 0 1 0.5 -1.5"></path>
                    </svg>
                    <span class="md:block">Exibir Somente</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                
                <div x-show="open" @click.away="open = false" class="z-40 fixed  bg-white rounded-lg shadow-lg md:mt-2 md:mr-2 block py-1 right-0 mr-10">
                    <h3 class="px-2 text-gray-600 text-xl border-b border-gray-400">
                            Status 
                    </h3>
                    @foreach($filterOptions as $index => $options)                        
                        <label class="flex justify-start items-center text-truncate hover:bg-gray-100 px-4 py-2">
                            <div class="text-teal-600 mr-3">
                            <input type="checkbox" @if(isset($filter[$index])) checked @elseif(count($filter) == 0 ) checked @endif name="filter[{{$index}}]" value="{{$options['value']}}" class="form-checkbox focus:outline-none focus:shadow-outline">
                            </div>
                            <div class="select-none text-gray-700">{{$options['name']}}</div>
                        </label>
                    @endforeach
                    <div class="flex justify-end">
                        <button type="submit" class="flex bg-indigo-800 hover:bg-indigo-700 focus:outline-none  text-white font-semibold  border border-gray-700 rounded-lg shadow-sm px-4 py-2 m-2">
                            ok
                        </button>
                    </div>
                </div>
                </div>
            </div>
        @endif
    </div>
</form>