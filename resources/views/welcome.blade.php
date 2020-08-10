@extends('layouts.app')

@section('content')
    <div class="rounded-md bg-red-100 p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm leading-5 font-medium text-red-800">
                    There were 2 errors with your submission
                </h3>
                <div class="mt-2 text-sm leading-5 text-red-700">
                    <ul class="list-disc pl-5">
                        <li>
                            Your password must be at least 8 characters
                        </li>
                        <li class="mt-1">
                            Your password must included at least one pro wrestling finishing move
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


@endsection


@push('body-script')

@endpush
    
