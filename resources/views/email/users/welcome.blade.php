@component('mail::message')
# Welcome to ModelRockets.Space

Thanks for joining our community!

@component('mail::button', ['url' => route('home')])
Check us out
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent