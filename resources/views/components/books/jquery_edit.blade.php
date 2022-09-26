{{-- wrapper, tab_item, error-border --}}
    <div class="py-5 mt-4 text-gray-500 border-b-[1px] border-[#e4dfdf] pl-[30px]">
    <div class="wrapper">
  
        <div class="tabs">
            <a class="inline tab">
                Osnovni detalji
            </a>
            <a class="tab inline ml-[70px] 
            @error('ISBN')
            error-border-tab
            @enderror
            ">
                Specifikacija 
                
            </a>
            <a class="tab inline ml-[70px]">
                Multimedija
            </a>      
        </div>

        <form action="{{route('update-book', $book->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="tab_content">
        
        <div class="tab_item">
            <x-books.book_info_edit :models="$models" :book="$book"></x-books.book_info_edit>
        </div>

        <div class="tab_item">
            <x-books.book_specification_edit :models="$models" :book="$book"></x-books.book_specification_edit>
        </div>
        
        <div class="tab_item">
            <x-books.book_multimedia_edit :book="$book"></x-books.book_multimedia_edit>
        </form>
        </div>
        
        </div>
        
    </form>
        
    </div>
    </div>
    
{{-- This had to be here --}}
<script>
    $(".wrapper .tab").click(function() {
    $(".wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
    $(".tab_item").hide().eq($(this).index()).fadeIn()
}).eq(0).addClass("active");
</script>

