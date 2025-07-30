<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Blog</title>
  <link rel="stylesheet" href="{{ asset('css/create-blog.css') }}">

</head>
<body>

  <div class="form-container">
    <h2>Create New Blog</h2>
    <form action="/submit-blog" method="POST">
      @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>
      </div>

      <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" rows="6" required></textarea>
      </div>

      <button type="submit" class="btn">Publish</button>
    </form>
  </div>

</body>
</html>
