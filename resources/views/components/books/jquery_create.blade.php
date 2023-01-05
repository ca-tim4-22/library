<div class="py-5 mt-4 text-gray-500 border-b-[1px] border-[#e4dfdf] pl-[30px]">
    <div class="wrapper">

        <div class="tabs">
            <a class="inline tab
            @error('title')error-border-tab @enderror
            @error('body')error-border-tab @enderror
            @error('category_id')error-border-tab @enderror
            @error('genre_id')error-border-tab @enderror
            @error('author_id')error-border-tab @enderror
            @error('publisher_id')error-border-tab @enderror
            @error('year')error-border-tab @enderror
            @error('quantity_count')error-border-tab @enderror
            ">
                {{__('Osnovni detalji')}}
            </a>
            <a class="tab inline ml-[70px] 
            @error('page_count')error-border-tab @enderror
            @error('language_id')error-border-tab @enderror
            @error('letter_id')error-border-tab @enderror
            @error('binding_id')error-border-tab @enderror
            @error('format_id')error-border-tab @enderror
            @error('ISBN')error-border-tab @enderror
            ">
                {{__('Specifikacija')}}

            </a>
            <a class="tab inline ml-[70px] 
            @error('cover')error-border-tab @enderror
            ">
                {{__('Multimedija')}}
            </a>
        </div>

        <form action="{{route('store-book')}}" method="POST"
              enctype="multipart/form-data">
            @csrf @honeypot

            <div class="tab_content">

                <div class="tab_item">
                    <x-books.book_info_create
                            :models="$models"></x-books.book_info_create>
                </div>

                <div class="tab_item">
                    <x-books.book_specification_create
                            :models="$models"></x-books.book_specification_create>
                </div>

                <div class="tab_item">
                    <x-books.book_multimedia_create></x-books.book_multimedia_create>
        </form>
    </div>

</div>

</form>

</div>
</div>

{{-- This had to be here --}}
<script>
    $(".wrapper .tab").click(function () {
        $(".wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
        $(".tab_item").hide().eq($(this).index()).fadeIn()
    }).eq(0).addClass("active");
</script>

