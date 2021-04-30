{{-- resources/views/emails/password.blade.php --}}

{{ trans('message.passwordclickreset') }} <a href="{{ url('admin_password/reset/'.$token) }}">{{ url('admin_password/reset/'.$token) }}</a>
