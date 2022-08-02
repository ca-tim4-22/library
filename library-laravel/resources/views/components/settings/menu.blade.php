<div class="py-4 text-gray-500 border-b-[1px] border-[#e4dfdf] pl-[30px]">
    <a href="{{route('setting-policy')}}" class="inline hover:text-blue-800 {{(request()->is('podesavanja/polisa')) ? 'active-book-nav' : ''}}">
        Polisa
    </a>
    <a href="{{route('setting-category')}}" 
    class="inline ml-[70px] hover:text-blue-800 {{(request()->is('podesavanja/kategorije')) ? 'active-book-nav' : ''}}">
    Kategorije
    </a>
    <a href="{{route('setting-genre')}}" class="inline ml-[70px] hover:text-blue-800">
        Žanrovi
    </a>
    <a href="{{route('setting-publisher')}}" class="inline ml-[70px] hover:text-blue-800">
        Izdavač
    </a>
    <a href="{{route('setting-binding')}}" class="inline ml-[70px] hover:text-blue-800">
        Povez
    </a>
    <a href="{{route('setting-format')}}" class="inline ml-[70px] hover:text-blue-800">
        Format
    </a>
    <a href="{{route('setting-letter')}}" class="inline ml-[70px] hover:text-blue-800">
        Pismo
    </a>
</div>