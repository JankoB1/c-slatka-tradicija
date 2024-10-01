@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://c-slatkatradicija.rs/images/logo-c.png" style="width: fit-content;" class="logo" alt="C slatka tradicija logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
