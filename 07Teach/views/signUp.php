<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <h1>Sign Up</h1>
    <form action="/07Teach/index.php" method="POST">
        <label for="username">Create Username</label><br>
        <input type="text" name="username"><br>
        <label for="password">Create Password</label><br>
        <input type="password" name="password"><br>
        <input type="hidden" name="action" value="signUpUser">
        <button type="submit">Sign Up</button>
    </form>
</body>
</html>