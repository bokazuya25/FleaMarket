@component('mail::message')
# COATCHTECHフリマからのお知らせ

{{ $messageContent }}

Thanks,{{ config('app.name') }}
@endcomponent