    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Blog</title>
  <link rel="stylesheet" href="{{ asset('css/create-blog.css') }}">
</head>
<body>

  <div class="container">
    <h2>Edit Blog</h2>

    <form action="/update-blog/{{ $blog['id'] }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ $blog['title'] }}" required>
      </div>

      <div class="form-group">
        <label for="content">Content:</label>
        <textarea id="content" name="content" rows="5" required>{{ $blog['content'] }}</textarea>
      </div>

      <button type="submit" class="btn-update">Update Blog</button>
      <a href="/create-blog" class="btn-cancel">Cancel</a>
    </form>
  </div>

</body>
</html>
