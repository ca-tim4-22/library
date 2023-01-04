<div class="py-4 text-gray-500 border-b-[1px] border-[#e4dfdf] pl-[30px]">
    <a href="{{route('setting-policy')}}"
       class="inline hover:text-blue-800 {{(request()->is('podesavanja/polisa')) ? 'active-book-nav' : ''}}">
        {{__('Polisa')}}
    </a>
    <a href="{{route('setting-category')}}"
       class="inline ml-[70px] hover:text-blue-800 {{(request()->is('podesavanja/kategorije')) ? 'active-book-nav' : ''}}">
        {{__('Kategorije')}}
    </a>
    <a href="{{route('setting-genre')}}"
       class="inline ml-[70px] hover:text-blue-800 {{(request()->is('podesavanja/zanrovi')) ? 'active-book-nav' : ''}}">
        {{__('Žanrovi')}}
    </a>
    <a href="{{route('setting-publisher')}}"
       class="inline ml-[70px] hover:text-blue-800 {{(request()->is('podesavanja/izdavaci')) ? 'active-book-nav' : ''}}">
        {{__('Izdavači')}}
    </a>
    <a href="{{route('setting-binding')}}"
       class="inline ml-[70px] hover:text-blue-800 {{(request()->is('podesavanja/povezi')) ? 'active-book-nav' : ''}}">
        {{__('Povezi')}}
    </a>
    <a href="{{route('setting-format')}}"
       class="inline ml-[70px] hover:text-blue-800 {{(request()->is('podesavanja/formati')) ? 'active-book-nav' : ''}}">
        {{__('Formati')}}
    </a>
    <a href="{{route('setting-letter')}}"
       class="inline ml-[70px] hover:text-blue-800 {{(request()->is('podesavanja/pisma')) ? 'active-book-nav' : ''}}">
        {{__('Pisma')}}
    </a>
    @if (Auth::check() && Auth::user()->type->id == 3)
    <a href="{{route('setting-statistics')}}"
       class="inline ml-[70px] hover:text-blue-800 {{(request()->is('podesavanja/statistika')) ? 'active-book-nav' : ''}}">
        {{__('Statistika')}}
    </a>
    <a href="{{route('setting-extra')}}"
       class="inline ml-[70px] hover:text-blue-800 {{(request()->is('podesavanja/dodatno')) ? 'active-book-nav' : ''}}">
        {{__('Dodatno')}}
    </a>
    @endif
</div>
    