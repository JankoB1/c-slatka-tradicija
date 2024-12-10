@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://c-slatkatradicija.rs/images/logo-c.png" style="width: 120px; height: auto; display: block; margin: 0 auto;" class="logo" alt="C slatka tradicija logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
