<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Profile</title>
  <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>
  <div class="profile-container">

    <h2>Your Profile</h2>

    <form action="/upload-profile-picture" method="POST" enctype="multipart/form-data">
      @csrf
      <strong>Upload Profile Picture</strong><br>
      <input type="file" name="profile_picture" required>
      <br>
      <button type="submit">Upload</button>
    </form>

    @if ($profile_picture)
      <img src="{{ asset('storage/' . $profile_picture) }}" alt="Profile Picture">
    @endif

    <div class="profile-info">
      <p><strong>Full Name:</strong> {{ $fullname }}</p>
      <p><strong>Username:</strong> {{ $username }}</p>
      <p><strong>Email:</strong> {{ $email }}</p>
    </div>
     <a href="/dashboard" class="back-btn">← Back to Dashboard</a>
  </div>
</body>
</html>
