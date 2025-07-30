<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Blog</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/create-blog.css') }}">
</head>
<body>

  <div class="container">

    <a href="/dashboard" class="back-btn">← Back to Dashboard</a>

    <h2>Create a New Blog Post</h2>

    @if(session('success'))
      <div class="success">{{ session('success') }}</div>
    @endif

    <form action="/submit-blog" method="POST">
      @csrf
      <label for="title">Title</label>
      <input type="text" name="title" id="title" required>

      <label for="content">Content</label>
      <textarea name="content" id="content" rows="6" required></textarea>

      <button type="submit">Submit Blog</button>
    </form>

    <hr>

    <h3>Submitted Blogs</h3>

    @php
      $blogs = session('blogs', []);
    @endphp

    @if(count($blogs) > 0)
      @foreach($blogs as $blog)
        <div class="blog-entry">
          <h4>{{ $blog['title'] }}</h4>
          <p>{{ $blog['content'] }}</p>
          @if(isset($blog['id']))
            <a href="/delete-blog/{{ $blog['id'] }}"
               class="delete-link"
               onclick="return confirm('Are you sure you want to delete this blog?')">
              🗑️ Delete
            </a>
          @endif
        </div>
      @endforeach
    @else
      <p style="text-align: center;">No blogs submitted yet.</p>
    @endif

  </div>

</body>
</html>
