<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Account Settings</title>
  <link rel="stylesheet" href="{{ asset('css/settings.css') }}">

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
      <a href="/dashboard" class="back-btn">← Back to Dashboard</a>
    </form>

    @if(session('success'))
      <div class="success-message">
        {{ session('success') }}
      </div>
    @endif

  </div>

</body>
</html>
