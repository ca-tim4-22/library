<div class="py-4 text-gray-500 border-b-[1px] border-[#e4dfdf] pl-[30px]">
    <a href="{{route('setting-policy')}}" class="inline hover:text-blue-800 {{(request()->is('podesavanja/polisa')) ? 'active-book-nav' : ''}}">
        Polisa
    </a>
    <a href="{{route('setting-category')}}" 
    class="inline ml-[70px] hover:text-blue-800 {{(request()->is('podesavanja/kategorije')) ? 'active-book-nav' : ''}}">
    Kategorije
    </a>
    <a href="{{route('setting-genre')}}" class="inline ml-[70px] hover:text-blue-800 {{(request()->is('podesavanja/zanrovi')) ? 'active-book-nav' : ''}}">
        Žanrovi
    </a>
    <a href="{{route('setting-publisher')}}" class="inline ml-[70px] hover:text-blue-800 {{(request()->is('podesavanja/izdavaci')) ? 'active-book-nav' : ''}}">
        Izdavači
    </a>
    <a href="{{route('setting-binding')}}" class="inline ml-[70px] hover:text-blue-800 {{(request()->is('podesavanja/povezi')) ? 'active-book-nav' : ''}}">
        Povezi
    </a>
    <a href="{{route('setting-format')}}" class="inline ml-[70px] hover:text-blue-800 {{(request()->is('podesavanja/formati')) ? 'active-book-nav' : ''}}">
        Formati
    </a>
    <a href="{{route('setting-letter')}}" class="inline ml-[70px] hover:text-blue-800 {{(request()->is('podesavanja/pisma')) ? 'active-book-nav' : ''}}">
        Pisma
    </a>
    <a href="{{route('setting-extra')}}" class="inline ml-[70px] hover:text-blue-800 {{(request()->is('podesavanja/dodatno')) ? 'active-book-nav' : ''}}">
        Dodatno
    </a>
</div>