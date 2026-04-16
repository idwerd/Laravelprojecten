<!DOCTYPE html>
<html>
<head>
    <title>Stel een nieuw wachtwoord in</title>
</head>
<body>
    <h1>Hallo, {{ $user->name }}!</h1>
    <a href="{{ route('account.new_password') }}">Klik hier om een nieuw wachtwoord in te stellen.</a>
    
</body>
</html>