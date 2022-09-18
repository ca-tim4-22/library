<style>
    .wrapper .active { 
        color: #2196f3;
        border-bottom: 2px solid #2196f3;
        padding-bottom: 18px;
    }
    .tab_item { display: none; }
    .tab_item:first-child { display: block; }
    .tab {
        cursor: pointer
    }
    .error-border {
        color: red !important;
        border-bottom: 2px solid red;
        padding-bottom: 18px;
    }
    .error-border:hover {
        color: red;
    }
    </style>

    <div class="py-5 mt-4 text-gray-500 border-b-[1px] border-[#e4dfdf] pl-[30px]">
    <div class="wrapper">
  
        <div class="tabs">
            <a class="inline tab hover:text-blue-800">
                Osnovni detalji
            </a>
            <a class="tab inline ml-[70px] hover:text-blue-800 
            @error('ISBN')
            error-border  
            @enderror
            ">
                Specifikacija 
                
            </a>
            <a class="tab inline ml-[70px] hover:text-blue-800">
                Multimedija
            </a>      
        </div>

        <form action="{{route('store-book')}}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="tab_content">
        
        <div class="tab_item">
            <x-books.book_info_edit :models="$models" :book="$book"></x-books.book_info_edit>
        </div>

        <div class="tab_item">
            <x-books.book_specification_edit :models="$models" :book="$book"></x-books.book_specification_edit>
        </div>
        
        <div class="tab_item">
            <x-books.book_multimedia_edit></x-books.book_multimedia_edit>
        </form>
        </div>
        
        </div>
        
    </form>
        
    </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script>
        $(".wrapper .tab").click(function() {
        $(".wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
        $(".tab_item").hide().eq($(this).index()).fadeIn()
    }).eq(0).addClass("active");
    </script>

