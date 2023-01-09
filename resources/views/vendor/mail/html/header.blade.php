<tr>
    <td class="header">
        <a style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
            <img src="{{asset('library-favicon.ico')}}" class="logo">
            @else
            {{ $slot }}
            @endif
        </a>
    </td>
</tr>
