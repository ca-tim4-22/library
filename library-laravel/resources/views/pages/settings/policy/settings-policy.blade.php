@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Podešavanja | Polise - Online Biblioteka</title>
    
@endsection

@section('content')
<x-jquery.jquery></x-jquery.jquery>

 <!-- Content -->
 <section class="w-screen h-screen pl-[80px] py-4 text-gray-700">
    <!-- Heading of content -->
    <div class="heading mt-[7px]">
        <div class="border-b-[1px] border-[#e4dfdf]">
            <div class="pl-[30px] pb-[21px]">
                <h1>
                    Podešavanja
                {{-- Policy update flash message --}}
                @if (session()->has('policy-updated'))
                <div style="width:30%" id="hideDiv" class="flex p-2 mt-2 mb-1 text-sm text-green-700 bg-green-200 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Success!</span> {{session('policy-updated')}}
                    </div>
                </div>
                @endif
                

                </h1>
                
            </div>
        </div>
    </div>
    
    {{-- Component for menu --}}
    <x-settings.menu></x-settings.menu>
    
    <div class="height-ucenikProfile pb-[30px] scroll">
        <!-- Space for content -->
        <div class="section-">
            
            <div class="flex flex-col">


                @foreach ($policies as $policy)

                <div class="pl-[30px] py-[20px] flex border-b-[1px] border-[#e4dfdf]">
                    <div>
                        <h3>
                            {{$policy->variable}}
                        </h3>
                        <p class="pt-[15px] max-w-[400px]">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eligendi nihil, vel
                            necessitatibus saepe laboriosam! Perspiciatis laboriosam culpa veritatis ea
                            voluptatum commodi tempora unde, dolorum debitis quia id dicta vitae.
                        </p>
                    </div>
                    <div class="relative ml-[60px] mt-[20px]">
                        <form class="flex" method="POST" action="{{route('update-policy', $policy->id)}}">
                            @csrf
                            @method('PUT')
                            <button 
                            type="submit"
                            style="border: none;outline: none"
                            class="text-sm text-white bg-[#4558BE] rounded-l-md px-4 py-2 whitespace-no-wrap">
                            <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i> Izmijeni
                            </button>
                            <input type="text" name="variable" value="{{$policy->variable}}" class="hidden" />
                            <input type="text" name="value" value="{{$policy->value}}"
                                class="h-[50px] flex-1 w-full px-4 py-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-r-md shadow-sm appearance-none focus:outline-none "
                                placeholder="..." />
                            <p class="ml-[10px] mt-[15px]">dana</p>
                            
                        </form>
                        
                       
                    </div>
                </div>
                
                @endforeach 
                @error('value')
                <div>
                    <p style="margin-left: 2%;margin-top: 1%" class="text-sm text-red-500">{{ $message }}</p>
                </div>
                @enderror
            </div>
        </div>
    </div>
</section>
<!-- End Content -->
</main>
<!-- End Main content -->
    
@endsection