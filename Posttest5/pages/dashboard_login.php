<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login & Registration Form</title>
  <link rel="stylesheet" href="../style/login.css">
</head>
<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form action="login.php" method="POST">
        <input type="text" placeholder="Username" name="username_user" required>
        <input type="password" placeholder="Password" name="password_user" required>
        <a href="#">Forgot password?</a>
        <input type="submit" class="button" value="Login" name="login">
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <label for="check">Signup</label>
        </span>
      </div>
    </div>
    <div class="registration form">
      <header>Signup</header>
      <form action="register.php" method="POST">
        <input type="text" placeholder="Full Name" name="name_new">
        <input type="text" placeholder="Username" name="username_new">
        <input type="password" placeholder="Password" name="password_new">
        <input type="email" placeholder="Your Active Email" name="email_new">
        <input type="submit" class="button" value="Signup" name="signup">
      </form>
      <div class="signup">
        <span class="signup">Already have an account?
         <label for="check">Login</label>
        </span>
      </div>
    </div>
  </div>
</body>
</html>