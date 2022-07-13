<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="/register">
        @csrf
        <input type="email" name="user_email" id="user_email" placeholder="user email">
        <input type="password" name="user_password" id="user_password" placeholder="user password">
        <input type="password" name="user_password_retype" id="user_password_retype" placeholder="user password retype">
        <button type="submit">Send</button>
    </form>
</body>
</html>