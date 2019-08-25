@component('mail::message')
# Greetings {{ $user->username }}!<br>

Thanks for joining our community! We're a bunch of rocket loving space enthusiasts and happy to have you join us!

@component('mail::button', ['url' => route('home')])
Sign In 🚀
@endcomponent

Ad Astra,<br>
Model Rockets Space
<br><br>
***Space is the place, and it's for everyone*** 
👩‍🚀👩🏿‍🚀👨‍🚀👩🏾‍🚀👨🏽‍🚀🐶👽🐵🐭
<br>    
@endcomponent