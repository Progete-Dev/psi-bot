<div x-data="{ open: false }" x-init="setTimeout(()=> open=true,250)"  class="fixed inset-0 overflow-hidden z-10">
    <div class="absolute inset-0 overflow-hidden">
        <div x-show="open"  {{$attributes}} x-transition:enter="ease-in-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <section class="absolute inset-y-0 right-0 pl-10 max-w-full flex">
            <div class="w-screen max-w-md" x-description="Slide-over panel, show/hide based on slide-over state." x-show="open" x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">
                <div class="h-full flex flex-col space-y-6 pb-16 pt-6 md:pb-3 md:pt-6 bg-primary shadow-xl overflow-y-scroll">
                    <header class="px-4 sm:px-6">
                        <div class="flex items-start justify-between space-x-3">
                            <h2 class="text-lg leading-7 font-medium text-secondary">
                                {{$title}}
                            </h2>
                            <div class="h-7 flex items-center">
                                <button {{$attributes}} aria-label="Close panel" class="text-primary hover:text-secondary transition ease-in-out duration-150">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </header>
                    {{$slot}}
                </div>
            </div>
        </section>
    </div>
</div>
