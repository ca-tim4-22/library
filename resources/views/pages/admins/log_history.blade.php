@extends('layouts.dashboard')

@section('title')

    <!-- Title -->
    <title>{{__('Administratori | Online biblioteka')}}</title>

@endsection

@section('content')


    <div style="padding-top: 3.3rem" class="m-auto w-full">
        @if ($admin->authentications()->exists())
        <table class="w-4/5 divide-gray-200 m-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('IP ADDRESS')}}
                    </th>
                    <th scope="col" class="text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('BROWSER')}}
                    </th>
                    <th scope="col" class="text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('LOCATION')}}
                    </th>
                    <th scope="col" class="text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('LOGIN SUCCESSFUL')}}
                    </th>
                    <th scope="col" class="text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('CLEARED BY USER')}}
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach ($col as $auth)
              <tr>
                 <td class="px-6 py-4 whitespace-nowrap">
                     <div class="flex items-center justify-center">
                     <div class="ml-4">
                         <div class="text-sm font-medium text-gray-900">
                             {{$auth->ip_address}}
                         </div>
                     </div>
                     </div>
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap">
                     <div class="text-center text-sm text-gray-900">
                         {{Str::limit($auth->user_agent, 26)}}
                     </div>
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap">
                     <div class="text-center text-sm text-gray-900">
                         N/A
                     </div>
                 </td>
                 <td class="text-center px-6 py-4 whitespace-nowrap">
                     {!! $auth->login_successful ? '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Yes</span>' : '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">No</span>' !!}
                 </td>
                 <td class="text-center px-6 py-4 whitespace-nowrap">
                     {!! $auth->cleared_by_user ? '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Yes</span>' : '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">No</span>' !!}
                 </td>
             </tr>
             @endforeach

            </tbody>
        </table>

        <div class="flex justify-center mt-5">{!! $col->links() !!}</div>    

        @else 
        <div class="text-center">{{__('Trenutno nema podataka.')}}</div>
        @endif
        
        </div>
        

<script src="https://cdn.tailwindcss.com"></script>

@endsection


