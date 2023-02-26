@component('mail::message')
# Introduction

planet-dev-restapi

@component('mail::button', ['url' => 'http://localhost:8000/password-reset?token='.$token])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent