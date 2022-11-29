@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Podešavanja | Povezi - Online Biblioteka</title>
    
@endsection

@section('content')
{{-- Preloader --}}
<script src="{{asset('preloader/preloader.js')}}" ></script>
{{-- Sweet Alert --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
{{-- Tailwind --}}
<script src="https://cdn.tailwindcss.com"></script>
{{-- Trash delete icon --}}
<link rel="stylesheet" href="{{asset('trash_delete/trash_delete.css')}}">
{{-- Csrf Token --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

 <!-- Content -->
 <body class="small:bg-gradient-to-r small:from-green-400 small:to-blue-500" onload="myFunction()">
 <section class="w-screen h-screen pl-[80px] py-4 text-gray-700">
    <!-- Heading of content -->
    <div class="heading mt-[7px]">
            <div class="heading mt-[7px]" style="margin-top: 10px">
                <h1 style="font-size: 30px" class="pl-[30px] pb-[22px] border-b-[1px] border-[#e4dfdf] ">
                    Podešavanja


{{-- Session message for binding create --}}
@if (session()->has('success-binding'))
<script>
    swal({
       title: "Uspješno!", 
       text: "Dodali ste povez!", 
       timer: 2500,
       type: "success",
    });
</script>
@endif 

{{-- Binding update flash message --}}
@if (session()->has('binding-updated'))
<script>
    swal({
       title: "Uspješno!", 
       text: "Izmijenili ste povez!", 
       timer: 2500,
       type: "success",
    });
</script>
@endif 

                </h1>
            </div>
        </div>
    </div>
    
    {{-- Component for menu --}}
    <x-settings.menu></x-settings.menu>

<!-- Space for content -->
{{-- Preloader --}}
<div id="loader"></div>
<div style="display:none;" id="myDiv">
    <div class="height-kategorije pb-[30px] scroll">
        
        <div class="flex items-center justify-between px-[50px] py-8 space-x-3 rounded-lg">
            <a href="{{route('new-binding')}}"
            class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] tracking-wider text-white bg-[#3f51b5] hover:bg-[#4558BE]">
                <i class="fas fa-plus mr-[15px]"></i> Novi povez
            </a>
            <div class="flex items-center">

                <style>
                    #pagination {
                        border-left: 1px solid #4558BE;
                        border-bottom: 0.4px solid #000;
                        cursor: pointer;
                    }
                </style>
                <form> 
                    Broj redova po strani:
                    <select id="pagination" style="outline: none">
                        <option value="5" @if($items == 5) selected @endif >5</option>
                        <option value="10" @if($items == 10) selected @endif >10</option>
                        <option value="25" @if($items == 25) selected @endif >25</option>
                        <option value="50" @if($items == 50) selected @endif >50</option>
                        <option value="100" @if($items == 100) selected @endif >100</option>
                    </select>
                </form>

                <script>
                    document.getElementById('pagination').onchange = function() {
                        window.location = "{{ $bindings->url(1) }}&items=" + this.value;
                    };
                </script>
                
                <form method="GET" action="{{ route('setting-binding') }}">
                    <div class="relative text-gray-600 focus-within:text-gray-400">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </form>
                        </span>
                        <input type="text" name="trazeno" value="{{$searched}}"
                            class="py-2 pl-10 text-sm bg-white rounded-md focus:outline-none  focus:text-gray-900"
                            placeholder="Traži..." autocomplete="off">
                            <a href="https://www.algolia.com" target="_blank">
                                <img class="algolia" src="{{asset('algolia.png')}}" alt="Algolia Logo">
                            </a>
                    </div>
                    </div>
                    </form>
        </div>

        <div class="inline-block min-w-full px-[50px] pt-3 align-middle bg-white rounded-bl-lg rounded-br-lg shadow-dashboard">

            @if (count($bindings) > 0)

            <button type="submit" class="btn-animation inline-flex items-center text-sm py-2.5 px-5 rounded-[5px] tracking-wider text-white bg-[#3f51b5] hover:bg-[#4558BE] button delete-all-bindings" data-url="">
                <div class="icon">
                    <svg class="top">
                        <use xlink:href="#top">
                    </svg>
                    <svg class="bottom">
                        <use xlink:href="#bottom">
                    </svg>
                </div>
                <span>Izbriši</span>
            </button>
            
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="top">
                    <path d="M15,4 C15.5522847,4 16,4.44771525 16,5 L16,6 L18.25,6 C18.6642136,6 19,6.33578644 19,6.75 C19,7.16421356 18.6642136,7.5 18.25,7.5 L5.75,7.5 C5.33578644,7.5 5,7.16421356 5,6.75 C5,6.33578644 5.33578644,6 5.75,6 L8,6 L8,5 C8,4.44771525 8.44771525,4 9,4 L15,4 Z M14,5.25 L10,5.25 C9.72385763,5.25 9.5,5.47385763 9.5,5.75 C9.5,5.99545989 9.67687516,6.19960837 9.91012437,6.24194433 L10,6.25 L14,6.25 C14.2761424,6.25 14.5,6.02614237 14.5,5.75 C14.5,5.50454011 14.3231248,5.30039163 14.0898756,5.25805567 L14,5.25 Z"></path>
                </symbol>
                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="bottom">
                    <path d="M16.9535129,8 C17.4663488,8 17.8890201,8.38604019 17.9467852,8.88337887 L17.953255,9.02270969 L17.953255,9.02270969 L17.5309272,18.3196017 C17.5119599,18.7374363 17.2349366,19.0993109 16.8365446,19.2267053 C15.2243631,19.7422351 13.6121815,20 12,20 C10.3878264,20 8.77565288,19.7422377 7.16347932,19.226713 C6.76508717,19.0993333 6.48806648,18.7374627 6.46907425,18.3196335 L6.04751853,9.04540766 C6.02423185,8.53310079 6.39068134,8.09333626 6.88488406,8.01304774 L7.02377738,8.0002579 L16.9535129,8 Z M9.75,10.5 C9.37030423,10.5 9.05650904,10.719453 9.00684662,11.0041785 L9,11.0833333 L9,16.9166667 C9,17.2388328 9.33578644,17.5 9.75,17.5 C10.1296958,17.5 10.443491,17.280547 10.4931534,16.9958215 L10.5,16.9166667 L10.5,11.0833333 C10.5,10.7611672 10.1642136,10.5 9.75,10.5 Z M14.25,10.5 C13.8703042,10.5 13.556509,10.719453 13.5068466,11.0041785 L13.5,11.0833333 L13.5,16.9166667 C13.5,17.2388328 13.8357864,17.5 14.25,17.5 C14.6296958,17.5 14.943491,17.280547 14.9931534,16.9958215 L15,16.9166667 L15,11.0833333 C15,10.7611672 14.6642136,10.5 14.25,10.5 Z"></path>
                </symbol>
            </svg>
        
        <script>
        document.querySelectorAll(".button").forEach(button =>
        button.addEventListener("click", e => {
        if (!button.classList.contains("delete")) {
        button.classList.add("delete");
        
        setTimeout(() => button.classList.remove("delete"), 2200);
        }
        e.preventDefault();
        })
        );
        </script>

            <table id="sort" class="overflow shadow-lg rounded-xl min-w-full border-[1px] border-[#e4dfdf]" id="myTable">
                <thead class="bg-[#EFF3F6]">
                    <tr class="border-b-[1px] border-[#e4dfdf]">
                        <td class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                            <label class="inline-flex items-center">
                                <input type="checkbox" id="check_all">
                            </label>
                        </td>

                        <td class="px-3 py-5 leading-4 tracking-wider text-left sakriveno checkme2">
                            <button
                            onclick="editBinding()"
                            style="outline: none;border: none;font-weight: bold;"
                                class="flex w-full px-1 text-sm leading-5 text-left text-blue-600 outline-none"
                                role="menuitem">
                                <i class="fas fa-edit mr-[5px] ml-[5px] py-1"></i>
                                <span style="padding-top: 1px;">Izmijeni povez</span>
                            </button>
                        </td>

                        <th class="px-4 py-4 leading-4 tracking-wider text-left checkme" id="arrow">
                            Naziv poveza
                        </th>

                        <td class="px-3 py-5 leading-4 tracking-wider text-left sakriveno checkme2">
                            <button
                            style="outline: none;border: none;font-weight: bold;"
                            class="flex w-full px-1 text-sm leading-5 text-left text-blue-600 outline-none delete-all-bindings" 
                            role="menuitem"
                            type="submit"
                            data-url="">
                            <i class="fas fa-trash mr-[5px] ml-[5px] py-1"></i>
                            <span style="padding-top: 1px;">Izbriši povez</span>
                            </button>
                            </td>

                        <td class="px-4 py-4" id="toggle"></td>
                    </tr>
                </thead>
                <tbody class="bg-white" id="tablex">
                    
                    @foreach ($bindings as $binding)

                    <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                        <td class="px-4 py-4 whitespace-no-wrap">
                            <label class="inline-flex items-center">
                                <input 
                                type="checkbox" 
                                id="check" 
                                value="{{$binding->name}}" 
                                class="form-checkbox checkbox"
                                data-id="{{$binding->id}}">
                            </label>
                        </td>
                        <td class="flex flex-row items-center px-4 py-4">
                            <p class="no-select">{{$binding->name}}</p>
                        </td>
                        <td class="px-4 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                            <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsBookBind hover:text-[#606FC7]">
                                <i class="fas fa-ellipsis-v"></i>
                            </p>
                            <div
                                class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-book-bind">
                                <div class="absolute right-[25px] w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                    aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                    <div class="py-1">
                                        <a href="{{route('edit-binding', $binding->name)}}" tabindex="0"
                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                            role="menuitem">
                                            <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                            <span class="px-4 py-0">Izmijeni povez</span>
                                        </a>
                                 
                                        <button 
                                        data-id="{{ $binding->id }}" 
                                        data-action="{{ route('bindings.destroy', $binding->id) }}"onclick="deleteConfirmation({{$binding->id}})"
                                        style="outline: none;border: none;"
                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                        <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">
                                        Izbriši povez
                                        </span>
                                        </button> 

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                        
                    @endforeach

                </tbody>
            </table>

            <div class="m-3">{!! $bindings->links() !!}</div>

        </div>
    </div>

    @else  

        <div class="w-[400px] flex items-center px-6 py-4 my-4 text-lg bg-[#3f51b5] rounded-lg">                       
            <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-white sm:w-5 sm:h-5">
                <path fill="currentColor"
                        d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                </path>
            </svg>
            <p class="font-medium text-white">Trenutno nema poveza u bazi podataka! </p>
        </div>

    @endif

</section>


<script type="text/javascript">
    function deleteConfirmation(id) {
        swal({
            title: "Izbriši?",
            text: "Da li ste sigurni da želite da izbrišete povez?",
            type: "warning",
            showCancelButton: !0,
            timer: '5000',
            animation: true,
            allowEscapeKey: true,
            allowOutsideClick: false,
            confirmButtonText: "Da, siguran sam!",
            cancelButtonText: "Ne, odustani",
            reverseButtons: !0,
            confirmButtonColor: '#14de5e',
            cancelButtonColor: '#f73302',
        }).then(function (e) {
            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                swal(
                    'Uspješno!',
                    'Povez je uspješno izbrisan.',
                    'success'
                    ).then(function() {
                     window.location.href = "/podesavanja/povezi";
                    });
                $.ajax({
                    type: 'POST',
                    url: "{{url('/podesavanja/povezi')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                    }
                });
            } else {
                e.dismiss;
            }
        }, function (dismiss) {
            return false;
        })
    }
    $(document).ajaxStop(function(){
 // window.location.reload();
 // window.location.href = "/bibliotekari";
 });

// Script for edit binding profile top header
function editBinding() {
var name = $('#check:checked').val();
window.location.href = "/podesavanja/izmijeni-povez/" + name;
}
</script>


<style>
   .show {
       /* display: inline-block !important; */
   }
   .hidden_header {
       display: none !important;
   }
   .sakriveno {display: none !important}
   .sakriveno_email {display: none !important}
   .hide_toggle {display: none !important}
</style>

<script>
$('input#check').on('change', function() {  
   if($(this).is(":checked")) {
     var length = $('input#check:checked').length;
     if (length == 1) {
       $('.checkme').addClass('hidden_header');    
       $('.checkme2').addClass('show');    
       $('.checkme2').removeClass('sakriveno');   
       $('#toggle').addClass('hide_toggle');    
      } else {
       $('.checkme').removeClass('hidden_header');    
       $('.checkme2').removeClass('show');    
       $('.checkme2').addClass('sakriveno'); 
       $('#toggle').removeClass('hide_toggle');     
      }
   } else {
       $('.checkme').removeClass('hidden_header');    
       $('.checkme2').removeClass('show');    
       $('.checkme2').addClass('sakriveno');    
       $('#toggle').removeClass('hide_toggle');     
   }
});
</script>

<script type="text/javascript">
   $(document).ready(function () {
   $('#check_all').on('click', function(e) {
   if($(this).is(':checked',true))  
   {
   $(".checkbox").prop('checked', true);  
   } else {  
   $(".checkbox").prop('checked',false);  
   }  
   });
   $('.checkbox').on('click',function(){
   if($('.checkbox:checked').length == $('.checkbox').length){
   $('#check_all').prop('checked',true);
   }else{
   $('#check_all').prop('checked',false);
   }
   });
   $('.delete-all-bindings').on('click', function(e) {
   var idsArr = [];  
   $(".checkbox:checked").each(function() {  
   idsArr.push($(this).attr('data-id'));
   });  
   if(idsArr.length <=0)  
   {  

   swal({
    title: "Greška!",
    text: "Morate selektovati makar jedan povez.",
    type: "error",
    timer: 1500,
    confirmButtonText: 'U redu',
    allowEscapeKey: false,
    allowOutsideClick: false,
    });

   }  else {  
   if(confirm("Da li ste sigurni?")){  
   var strIds = idsArr.join(","); 
   $.ajax({
   url: "{{ route('delete-all-bindings') }}",
   type: 'DELETE',
   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
   data: 'ids='+strIds,
   success: function (data) {
   if (data['status']==true) {
   $(".checkbox:checked").each(function() {  
   $(this).parents("tr").remove();
   });
   alert(data['message']);
   } 
   else {
   swal({
    title: "Uspješno!",
    type: "success",
    timer: 1000,
    confirmButtonText: 'U redu',
    allowEscapeKey: false,
    allowOutsideClick: false,
    }).then(function() {
       window.location.href = "/podesavanja/povezi";
    });
   
   }
   },
   error: function (data) {
   alert(data.responseText);
   }
   });
   }  
   }  
   });
//    $('[data-toggle=confirmation]').confirmation({
//    rootSelector: '[data-toggle=confirmation]',
//    onConfirm: function (event, element) {
//    element.closest('form').submit();
//    }
//    });   
   });
   </script>


@endsection