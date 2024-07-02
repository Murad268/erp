<!DOCTYPE html>
<html>
<head>
    <title>Email Doğrulama</title>
</head>
<body>
<h1>Email Doğrulama</h1>
<p>Salam,</p>
<p>Emailinizi doğrulamaq üçün aşağıdakı linkə tıklayın:</p>
<a href="{{ route('register-verified', ['token' => $activation_token, 'user_id' => $user_id]) }}">
    Emaili Doğrula
</a>
</body>
</html>
