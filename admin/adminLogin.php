<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/2_admin_login.css">
</head>
<body>
    <div class="form-container">
        <form action="php/adminLogin_process.php" method="post">
            <label for="" class="login-label">Admin Name:</label> <br>
            <input type="text" class="login-input" name="admin_name"> <br>

            <label for="" class="login-label">Password: </label> <br>
            <input type="password" class="login-input" name="password"> <br>

            <button type="submit" name="admin-login" id="admin-login">Login</button>
        </form>
    </div>
</body>
</html>