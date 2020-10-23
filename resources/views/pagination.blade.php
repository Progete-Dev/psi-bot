@if ($paginator->hasPages())
    <nav class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
        <div class="flex-1 flex justify-between sm:justify-end">
            <button {{$paginator->onFirstPage() ? 'disabled' : ''}} wire:click="previousPage" class="{{$paginator->onFirstPage() ? 'text-gray-500 border-gray-200' : 'border-gray-300 text-gray-700' }} inline-flex items-center px-4 py-2 border text-sm leading-5 font-medium rounded-md  bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                Anterior
            </button>
            <button {{!$paginator->hasMorePages() ? 'disabled' : ''}} wire:click="nextPage" class="{{!$paginator->hasMorePages() ? 'text-gray-500 border-gray-200' : 'border-gray-300 text-gray-700' }} ml-3 inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                Próximo
            </button>
        </div>
    </nav>
@endif