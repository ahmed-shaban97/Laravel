{{-- resources/views/emails/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="email-container">
        <h1>Welcome, {{ $user->name }}</h1>
        <p>Thank you for registering on our website.</p>
        <p>We are excited to have you on board.</p>
    </div>
</body>

</html>
