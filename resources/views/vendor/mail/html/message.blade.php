@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
<span style="color: #fff">{{__('Online biblioteka')}}</span>
<img style="display: inline" width="20" src="https://i.postimg.cc/8zHBd26y/library-favicon.png" alt="">
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }} All rights reserved.
@endcomponent
@endslot
@endcomponent
