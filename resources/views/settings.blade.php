<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Account Settings</title>
  <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
  <style>
    /* Optional inline CSS if you don't have a CSS file yet */
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      padding: 30px;
    }

    .settings-container {
      max-width: 500px;
      margin: 0 auto;
      background: #fff;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    button {
      padding: 10px 20px;
      background: #007bff;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    .success-message {
      margin-top: 10px;
      color: green;
    }
  </style>
</head>
<body>

  <div class="settings-container">
    <h2>Update Account Settings</h2>

    <form action="{{ route('settings.update') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fullname" value="{{ old('fullname', $user->fullname) }}" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
      </div>

      <div class="form-group">
        <label for="password">New Password</label>
        <input type="password" id="password" name="password" placeholder="Leave blank to keep current">
      </div>

      <button type="submit">Save Changes</button>
    </form>

    @if(session('success'))
      <div class="success-message">
        {{ session('success') }}
      </div>
    @endif

  </div>

</body>
</html>
