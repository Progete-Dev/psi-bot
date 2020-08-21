<div>
     @component('partials.card')
        @slot('cardHeader')
            <div class="p-2 shadow border w-full animate-bounce">
                <h1 class="text-3xl text-primary ">Olá</h1>
            </div>
        @endslot
            <div class="flex flex-wrap p-2">

                @for($i= 0 ; $i < 10 ; $i++)
                    @if($i%2 == 0  )
                        <div class="flex flex-col items-center">
                <div class="bg-white rounded-lg mt-5">
                    <img
                            src="https://source.unsplash.com/MNtag_eXMKw/1600x900"
                            class="h-40 rounded-md"
                            alt=""
                    />
                </div>
                <div class="bg-white shadow-lg rounded-lg -mt-4 w-64">
                    <div class="py-5 px-5">
                        <span class="font-bold text-gray-800 text-lg">Geek Pizza</span>
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-600 font-light">
                                Size : Regular
                            </div>
                            <div class="text-2xl text-red-600 font-bold">
                                $ {{$i+1}}.00
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                    @endif
                @endfor
            </div>
     @endcomponent

</div>
