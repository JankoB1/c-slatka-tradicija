<x-mail::message>
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Zdravo!')
@endif
@endif

{{-- Intro Lines --}}
{{ 'Molimo kliknite na dugme ispod kako bi verifikovali vašu email adresu.' }}

{{-- Action Button --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-mail::button :url="$actionUrl" :color="$color">
{{ $actionText }}
</x-mail::button>
@endisset

@lang("Ako niste registrovali nalog, nije potrebna dalja akcija.")<br>
@lang('Srdačno,')<br>
@lang('Vaša C Slatka tradicija')

{{-- Subcopy --}}
@isset($actionText)
<x-slot:subcopy>
@lang(
    "Ako imate problema da kliknete na dugme '\"Potvrdite Vašu email adresu'\", kopirajte ovaj url u Vaš browser:\n",
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
</x-slot:subcopy>
@endisset
</x-mail::message>
