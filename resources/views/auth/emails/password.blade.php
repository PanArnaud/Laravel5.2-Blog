Click here to reset your password: <br>
<a  href="{{ $link = url('password/reset', $token).'?email='.urlEncode($user->getEmailForPasswordReset()) }}">{{ $link }}</a>