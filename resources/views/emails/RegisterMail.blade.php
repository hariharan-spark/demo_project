@component('mail::message')
welcome User
Name:
{{$key['name']}}
Password:
{{$key['password']}}
@endcomponent
