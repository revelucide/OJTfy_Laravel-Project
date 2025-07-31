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
  
  <div class="nav-links">
    <a href="/profile">Profile</a>
    <a href="/settings">Settings</a>
    <a href="/messages">Messages</a>
    <a href="/create-blog">Blogs</a>
    <a href="/logout">Logout</a>
  </div>
</div>

<div class="welcome-bar">
  <p>Welcome back, <strong>{{ session('user.fullname') ?? 'User' }}</strong>!</p>
</div>
<div class="dashboard-container">

  <!-- LEFT SIDEBAR -->
  <!-- LEFT SIDEBAR (OJT Sidebar) -->
<div class="dashboard-sidebar">
  <h3>OJT Tracker</h3>
  <ul>
    <li><a href="#">📝 My Tasks</a></li>
    <li><a href="#">📅 Daily Logs</a></li>
    <li><a href="#">📁 Documents</a></li>
    <li><a href="#">📊 Progress Reports</a></li>
    <li><a href="#">⚙️ Settings</a></li>
  </ul>
</div>


  <!-- RIGHT MAIN CONTENT -->
  <div class="dashboard-main">
    <h2>Main Dashboard Area</h2>
    <p>This is where your actual dashboard content (cards, charts, stats, etc.) will go.</p>
  </div>

</div>



</body>
</html>
