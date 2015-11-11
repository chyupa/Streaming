<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Streaming</title>
</head>
<body>
    <form method="post" action="{{route('auth.post.login')}}">
        <input type="email" name="email" placeholder="Enter Email" />
        <br>
        <input type="password" name="password" placeholder="Enter Password" />
        <br>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <button type="submit">Log in</button>
    </form>
</body>
</html>