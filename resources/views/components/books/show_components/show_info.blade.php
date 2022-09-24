  <!-- Space for content -->
  <div class="section mt-[20px]">
    <div class="flex flex-row justify-between">
        <div class="mr-[30px]">
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
                    @foreach ($book->categories as $category)
                    {{$loop->first ? '' : '|'}}
                    {{$category->category->name}} 
                    @endforeach
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
                @foreach ($book->genres as $genre)
                {{$loop->first ? '' : '|'}}
                {{$genre->genre->name}}
                @endforeach
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
                @foreach ($book->authors as $author)
                {{$loop->first ? '' : '|'}}
                {{$author->author->NameSurname}}
                @endforeach
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
        <div class="mr-[70px] mt-[20px] flex flex-col max-w-[600px]">
            <div>
                <h4 class="text-gray-500 ">
                    Kratki sadržaj
                </h4>
                <p class="addReadMore showlesscontent my-[10px]">
                    {!! $book->body !!}
                </p>
                
                <a class="btn btn-primary" href="{{'/storage/pdf/' . $book->pdf}}" download>
                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                   Download PDF
                  </a>
            </div>
        </div>
    </div>
</div>