@extends('layouts.dashboard')

@section('title')

    <!-- Title -->
    <title>{{__('Administratori | Online biblioteka')}}</title>

@endsection

@section('content')


    <div style="padding-top: 3.3rem" class="m-auto w-full">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                    </th>
                    <th scope="col" class="text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email
                    </th>
                    <th scope="col" class="text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Role
                    </th>
                    <th scope="col" class="text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Created at
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center justify-center">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                           xxxxxx
                            </div>
                        </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-center text-sm text-gray-900">
                           email
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-center text-sm text-gray-900">
                           namee rolee
                        </div>
                    </td>
                    <td class="text-center px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">formatted at 
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
        
        
                        <a href="#" @click="deleteUser(user)" class="duration-100 ml-2 float-left text-red-400 hover:text-red-600 py-2 px-4  rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>

<script src="https://cdn.tailwindcss.com"></script>

@endsection


