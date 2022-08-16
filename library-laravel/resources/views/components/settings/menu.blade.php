<div class="py-4 text-gray-500 border-b-[1px] border-[#e4dfdf] pl-[30px]">
    <a href="{{route('setting-policy')}}" class="inline hover:text-blue-800 {{(request()->is('podesavanja/polisa')) ? 'active-book-nav' : ''}}">
        Polisa
    </a>
    <a href="{{route('setting-category')}}" 
    class="inline ml-[70px] hover:text-blue-800 {{(request()->is('podesavanja/kategorije')) ? 'active-book-nav' : ''}}">
    Kategorije
    </a>
    <a href="{{route('setting-genre')}}" class="inline ml-[70px] hover:text-blue-800 {{(request()->is('podesavanja/zanrovi')) ? 'active-book-nav' : ''}}"">
        Žanrovi
    </a>
    <a href="{{route('setting-publisher')}}" class="inline ml-[70px] hover:text-blue-800 {{(request()->is('podesavanja/izdavac')) ? 'active-book-nav' : ''}}"">
        Izdavači
    </a>
    <a href="{{route('setting-binding')}}" class="inline ml-[70px] hover:text-blue-800 {{(request()->is('podesavanja/povez')) ? 'active-book-nav' : ''}}"">
        Povezi
    </a>
    <a href="{{route('setting-format')}}" class="inline ml-[70px] hover:text-blue-800 {{(request()->is('podesavanja/format')) ? 'active-book-nav' : ''}}"">
        Formati
    </a>
    <a href="{{route('setting-letter')}}" class="inline ml-[70px] hover:text-blue-800 {{(request()->is('podesavanja/pismo')) ? 'active-book-nav' : ''}}"">
        Pisma
    </a>
</div>