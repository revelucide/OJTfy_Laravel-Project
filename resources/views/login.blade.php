<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Page</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

  <div class="login-container">
    <h2>Login</h2>

    @if (session('error'))
      <p style="color:red;">{{ session('error') }}</p>
    @endif

    <form action="/login" method="POST">
      @csrf
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required />
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />
      </div>
      <button type="submit" class="login-btn">Login</button>
    </form>

    <div class="register-link">
      Don't have an account? <a href="{{ url('/register') }}">Register here</a>
    </div>
  </div>

</body>
</html>
