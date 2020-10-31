<?php if (!$_SESSION['loggedIn']) {
    header("Location: /07Teach/index.php?action=signInPage");
} ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome <?php echo $_SESSION['username'] ?></h1>
</body>
</html>