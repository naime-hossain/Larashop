@component('mail::message')
# Thanks for your message
{{ $message['subject'] }}

{!! $message['message'] !!}

@component('mail::button', ['url' => route('home') ])
Visit Our site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
