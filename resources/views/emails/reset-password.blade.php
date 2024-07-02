<!DOCTYPE html>
<html>
<head>
    <title>Şifrəni Sıfırlama</title>
</head>
<body>
<h1>Şifrəni Sıfırlama</h1>
<p>Salam,</p>
<p>Şifrənizi sıfırlamaq üçün aşağıdakı linkə tıklayın:</p>
<a href="{{ route('reset-password-form', ['token' => $token]) }}">
    Şifrəni Sıfırla
</a>
</body>
</html>
