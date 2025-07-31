<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Messages</title>
  <link rel="stylesheet" href="{{ asset('css/message.css') }}">

</head>
<body>
  <div class="container">
     <a href="/dashboard" class="back-btn">← Back to Dashboard</a>
    <div class="title">Your Messages</div>

    <div class="message-card">
      <div class="message-header">System Notification</div>
      <div class="message-body">Your profile was successfully updated.</div>
      <div class="message-time">Just now</div>
    </div>

    <div class="message-card">
      <div class="message-header">Admin</div>
      <div class="message-body">Welcome to the dashboard! Let us know if you need any help.</div>
      <div class="message-time">2 hours ago</div>
    </div>

    <div class="message-card">
      <div class="message-header">New Comment</div>
      <div class="message-body">Someone replied to your blog post.</div>
      <div class="message-time">Yesterday</div>
    </div>

  </div>
</body>
</html>
