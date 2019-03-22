@component('mail::message')
# Reset Account
Welcome {{ $data['data']->name }} <br>
The body of your message.

@component('mail::button', ['url' => url('admin/resetpassword/'.$data['token'])])
Click Here To Reset Your Password!<br>

@endcomponent
Or Copy This link!<br>
<a href="{{ url('admin/resetpassword/'.$data['token']) }}"> {{url('admin/resetpassword/'.$data['token'])}} </a>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
