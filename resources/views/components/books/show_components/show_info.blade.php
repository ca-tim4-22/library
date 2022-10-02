@if (session()->has('update-book'))
<script>
    swal({
       title: "Uspješno!", 
       text: "Uspješno ste izmijenili knjigu!", 
       timer: 2500,
       type: "success",
    });
</script>
@endif

@if (session()->has('tried-cover'))
<script>
    swal({
       title: "Bezuspješno!", 
       text: "Ne možete izbrisati naslovnu fotografiju knjige!", 
       timer: 2500,
       type: "error",
    });
</script>
@endif

@if (session()->has('book-photo-deleted'))
<script>
    swal({
       title: "Uspješno!", 
       text: "Uspješno ste izbrisali fotografiju knjige!", 
       timer: 1500,
       type: "success",
    });
</script>
@endif

  <!-- Space for content -->
  <div class="section mt-[20px]">
    <div class="flex flex-row justify-between">
        <div id="margin_change1" class="mr-[30px]">
            <div class="mt-[20px]">
                <span class="text-gray-500 text-[14px]">Naziv knjige</span>
                <p class="font-medium">{{$book->title}}</p>
            </div>
            <div class="mt-[40px]">
                <span class="text-gray-500 text-[14px]">
                    @if ($book->categories->count() == 1)
                    Kategorija
                    @else
                    Kategorije
                    @endif
                </span>
                <p class="font-medium">
                    @if ($book->categories->count() > 0)
                    @foreach ($book->categories as $category)
                    {{$loop->first ? '' : '|'}}
                    {{$category->category->name}} 
                    @endforeach
                    @else  
                    Nepoznato
                    @endif
                </p>
            </div>
            <div class="mt-[40px]">
                <span class="text-gray-500 text-[14px]">
                @if ($book->genres->count() == 1)
                Žanr
                @else
                Žanrovi
                @endif
                </span>
                <p class="font-medium">
                @if ($book->genres->count() > 0)
                @foreach ($book->genres as $genre)
                {{$loop->first ? '' : '|'}}
                {{$genre->genre->name}}
                @endforeach
                @else  
                Nepoznato
                @endif
                </p>
            </div>
            <div class="mt-[40px]">
                <span class="text-gray-500 text-[14px]">
                @if ($book->authors->count() == 1)
                Autor
                @else
                Autori
                @endif
                </span>
                <p class="font-medium">
                @if ($book->authors->count() > 0)
                @foreach ($book->authors as $author)
                {{$loop->first ? '' : '|'}}
                {{$author->author->NameSurname}}
                @endforeach
                @else  
                Nepoznato
                @endif
                </p>
            </div>
            <div class="mt-[40px]">
                <span class="text-gray-500 text-[14px]">Izdavač</span>
                <p class="font-medium">{{$book->publisher->name}}</p>
            </div>
            <div class="mt-[40px]">
                <span class="text-gray-500 text-[14px]">Godina izdavanja</span>
                <p class="font-medium">{{$book->year}}</p>
            </div>
        </div>
        <div id="margin_change" class="mr-[70px] mt-[20px] flex flex-col max-w-[600px]">
            <div>
                <h4 class="text-gray-500 ">
                    Kratki sadržaj
                </h4>
                <p class="addReadMore showlesscontent my-[10px]">
                    {!! $book->body !!}
                </p>
                
                @if ($book->pdf != 0)
                <div class="mt-[20px]">
                    <a 
                    class="btn-animation inline-flex items-center text-sm py-2 px-3 transition duration-300 ease-in rounded-[5px] tracking-wider text-white bg-[#3f51b5] hover:bg-[#4558BE]" 
                    href="{{'/storage/pdf/' . $book->pdf}}" download>
                    <i class="fas fa-file-pdf mr-[5px]"></i>
                    Preuzmi PDF
                    </a>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
