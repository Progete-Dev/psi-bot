@extends('layouts.app')

@section('title', 'Home')
@section('content')

<div class="font-sans bg-grey flex flex-col min-h-screen w-full">
    <div class="flex justify-between ">        
      <div class="font-bold text-gray-800 text-xl mb-4 border-b w-full border-gray-400">
          Session
      </div>
    </div>
  <div>

<div class="container">
    <div class="bg-white shadow overflow-hidden  sm:rounded-lg">
        <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
            Applicant Information
            </h3>
            <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
            Personal details and application.
            </p>
        </div>
        <div class="px-4 py-5 sm:px-6">
            <dl class="grid grid-cols-1 col-gap-4 row-gap-8 sm:grid-cols-2">
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                Full name
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                Margot Foster
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                Application for
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                Backend Developer
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                Email address
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                margotfoster@example.com
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                Salary expectation
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                $120,000
                </dd>
            </div>
            <div class="sm:col-span-2">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                Progress
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                <!-- component -->
        <div class="w-full py-6">
        <div class="flex">
            <div class="w-1/4">
            <div class="relative mb-2">
                <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
                <span class="text-center text-white w-full">
                    <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path class="heroicon-ui" d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm14 8V5H5v6h14zm0 2H5v6h14v-6zM8 9a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm0 8a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </svg>
                </span>
                </div>
            </div>
        
            <div class="text-xs text-center md:text-base">Select Server</div>
            </div>
        
            <div class="w-1/4">
            <div class="relative mb-2">
                <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                    <div class="w-0 bg-green-300 py-1 rounded" style="width: 100%;"></div>
                </div>
                </div>
        
                <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
                <span class="text-center text-white w-full">
                    <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path class="heroicon-ui" d="M19 10h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2h-2a1 1 0 0 1 0-2h2V8a1 1 0 0 1 2 0v2zM9 12A5 5 0 1 1 9 2a5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm8 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h5a5 5 0 0 1 5 5v2z"/>
                    </svg>
                </span>
                </div>
            </div>
        
            <div class="text-xs text-center md:text-base">Add User</div>
            </div>
        
            <div class="w-1/4">
            <div class="relative mb-2">
                <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                    <div class="w-0 bg-green-300 py-1 rounded" style="width: 33%;"></div>
                </div>
                </div>
        
                <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                <span class="text-center text-gray-600 w-full">
                    <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path class="heroicon-ui" d="M9 4.58V4c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v.58a8 8 0 0 1 1.92 1.11l.5-.29a2 2 0 0 1 2.74.73l1 1.74a2 2 0 0 1-.73 2.73l-.5.29a8.06 8.06 0 0 1 0 2.22l.5.3a2 2 0 0 1 .73 2.72l-1 1.74a2 2 0 0 1-2.73.73l-.5-.3A8 8 0 0 1 15 19.43V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.58a8 8 0 0 1-1.92-1.11l-.5.29a2 2 0 0 1-2.74-.73l-1-1.74a2 2 0 0 1 .73-2.73l.5-.29a8.06 8.06 0 0 1 0-2.22l-.5-.3a2 2 0 0 1-.73-2.72l1-1.74a2 2 0 0 1 2.73-.73l.5.3A8 8 0 0 1 9 4.57zM7.88 7.64l-.54.51-1.77-1.02-1 1.74 1.76 1.01-.17.73a6.02 6.02 0 0 0 0 2.78l.17.73-1.76 1.01 1 1.74 1.77-1.02.54.51a6 6 0 0 0 2.4 1.4l.72.2V20h2v-2.04l.71-.2a6 6 0 0 0 2.41-1.4l.54-.51 1.77 1.02 1-1.74-1.76-1.01.17-.73a6.02 6.02 0 0 0 0-2.78l-.17-.73 1.76-1.01-1-1.74-1.77 1.02-.54-.51a6 6 0 0 0-2.4-1.4l-.72-.2V4h-2v2.04l-.71.2a6 6 0 0 0-2.41 1.4zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                    </svg>
                </span>
                </div>
            </div>
        
            <div class="text-xs text-center md:text-base">Setting</div>
            </div>
        
            <div class="w-1/4">
            <div class="relative mb-2">
                <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                    <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
                </div>
                </div>
        
                <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                <span class="text-center text-gray-600 w-full">
                    <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path class="heroicon-ui" d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z"/>
                    </svg>
                </span>
                </div>
            </div>
        
            <div class="text-xs text-center md:text-base">Finished</div>
            </div>
        </div>
        </div>
                </dd>
            </div>
            <div class="sm:col-span-2">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                Sessions
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                <ul class="border border-gray-200 rounded-md">
                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
                    <div class="w-0 flex-1 flex items-center">
                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"/>
                        </svg>
                        <span class="ml-2 flex-1 w-0 truncate">
                        resume_back_end_developer.pdf
                        </span>
                    </div>
                    <div class="ml-4 flex-shrink-0">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out">
                        Download
                        </a>
                    </div>
                    </li>
                    <li class="border-t border-gray-200 pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
                    <div class="w-0 flex-1 flex items-center">
                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"/>
                        </svg>
                        <span class="ml-2 flex-1 w-0 truncate">
                        coverletter_back_end_developer.pdf
                        </span>
                    </div>
                    <div class="ml-4 flex-shrink-0">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out">
                        Download
                        </a>
                    </div>
                    </li>
                </ul>
                </dd>
            </div>
            </dl>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection
