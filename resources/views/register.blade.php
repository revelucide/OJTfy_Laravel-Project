<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register Page</title>
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">

</head>
<body>

  <div class="register-container">
    <h2>Register</h2>
    @if (session('success'))
  <p style="color: green;">{{ session('success') }}</p>
@endif

@if ($errors->any())
  <ul style="color: red;">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif
    <form action="/register" method="POST">
        @csrf
      <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fullname" required />
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required />
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required />
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />
      </div>
      <button type="submit" class="register-btn">Register</button>
    </form>
    <div class="login-link">
      Already have an account? <a href="{{ url('/login') }}">Login here</a>

    </div>
  </div>

</body>
</html>
