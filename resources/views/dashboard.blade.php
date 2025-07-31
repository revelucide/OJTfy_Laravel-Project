<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

  <div class="navbar">
    <h1>My Dashboard</h1>
    <a href="/logout">Logout</a>
  </div>

  <div class="content">
    @php
      $user = session('user');
    @endphp

    <div class="welcome">
      Welcome back, <strong>{{ is_array($user) ? ($user['fullname'] ?? 'User') : 'User' }}</strong>!
    </div>

    <div class="grid">

      <a href="/profile" style="text-decoration: none; color: inherit;"> 
        <div class="card">
          <h2>Profile</h2>
          <p>View and update your profile information.</p>
        </div>
      </a>

      <a href="/settings" style="text-decoration: none; color: inherit;">
        <div class="card">
          <h2>Settings</h2>
          <p>Manage your account settings, change password</p>
        </div>
      </a>

      <a href="/messages" style="text-decoration: none; color: inherit;">
        <div class="card">
          <h2>Messages</h2>
          <p>Check new notifications and messages.</p>
        </div>
      </a>

      <a href="/create-blog" style="text-decoration: none; color: inherit;">
        <div class="card">
          <h2>Create blogs</h2>
          <p>View and create blog posts, share whats on your mind!</p>
        </div>
      </a>

    </div>
  </div>

</body>
</html>
