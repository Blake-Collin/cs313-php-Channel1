<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
<body>
    <h1>Sign In</h1>
    <form action="/07Teach/index.php" method="POST">
        <label for="username">Username</label><br>
        <input type="text" name="username"><br>
        <label for="password">Password</label><br>
        <input type="password" name="password"><br>
        <input type="hidden" name="action" value="signInUser">
        <button type="submit">Sign In</button>
    </form>
    <a href="/07Teach/index.php?action=signUpPage">Create an Account</a>
</body>
</html>