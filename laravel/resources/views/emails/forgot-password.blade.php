@component('mail::message')
# Reset your password

{{--Hi, {{$userName}}--}}
<p>Please, use this temporary password to log in to the system:</p>
{{--<p><b>{{$tempPassword}}</b></p>--}}
<br/>


@component('mail::button', ['url' => ''])
Try new password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
{{--<img src="{{ url('img/logo-drunkenmonkey.png') }}" alt="logo"></a>--}}
@endcomponent
