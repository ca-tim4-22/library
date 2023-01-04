@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Dobrodošli!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
$color = match ($level) {
    'success', 'error' => $level,
    default => 'primary',
};
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Pozdrav'),<br>
tim <span style="font-weight: bold;">nullable()</span>
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
"Ukoliko imate problema sa \":actionText\" dugmetom, kopirajte i nalijepite sledeći URL\n".
'u Vaš pretraživač:',
[
'actionText' => $actionText,
]
)
{{-- <span
        class="break-all">[{{ $displayableActionUrl }}]tim4.ictcortex.me</span> --}}
<a href="tim4.ictcortex.me">www.tim4.ictcortex.me</a>
@endslot
@endisset
@endcomponent
