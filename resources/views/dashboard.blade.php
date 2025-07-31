<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

  <!-- Top Navbar -->
  <div class="navbar">
    <div class="navbar-brand">
  <img src="{{ asset('images/logo.png') }}" alt="OJTfy Logo" class="ojtfy-logo">
</div>

    <div class="nav-links">
      <a href="/profile">Profile</a>
      <a href="/settings">Settings</a>
      <a href="/messages">Inbox</a>
      <a href="/create-blog">Blogs</a>
      <a href="/logout">Logout</a>
    </div>
  </div>

  <!-- Welcome Bar -->
  <div class="welcome-bar">
    <p>Welcome back, <strong>{{ session('user.fullname') ?? 'User' }}</strong>!</p>
  </div>

  <!-- Dashboard Layout -->
  <div class="dashboard-container">
    
    <!-- Sidebar -->
    <div class="dashboard-sidebar">
      <h3>📌 OJT Tracker</h3>
      <ul>
        <li><a href="#" class="menu-link" data-section="tasks">📝 My Tasks</a></li>
        <li><a href="#" class="menu-link" data-section="daily_logs">📅 Daily Logs</a></li>
        <li><a href="#" class="menu-link" data-section="documents">📁 Documents</a></li>
        <li><a href="#" class="menu-link" data-section="progress_reports">📊 Progress Reports</a></li>
        <li><a href="#" class="menu-link" data-section="daily_reports">🗒️ Daily Reports</a></li>

      </ul>
    </div>

    <!-- Main Content -->
    <div class="dashboard-main" id="dashboard-content">
      @include('partials.tasks') {{-- Default content --}}
    </div>

  </div>

  <!-- AJAX Loader Script -->
  <script>
  document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('.menu-link');
    const contentArea = document.getElementById('dashboard-content');

    links.forEach(link => {
      link.addEventListener('click', function (e) {
        e.preventDefault();
        const section = this.getAttribute('data-section');

        fetch(`/dashboard-section/${section}`)
          .then(res => res.text())
          .then(html => {
            contentArea.innerHTML = html;
          })
          .catch(err => {
            contentArea.innerHTML = '<p>Error loading section.</p>';
          });
      });
    });
  });
</script>


</body>
</html>
