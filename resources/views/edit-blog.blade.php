    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Edit Blog</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .container { max-width: 700px; margin: auto; }
        label { display: block; margin-top: 15px; }
        input, textarea { width: 100%; padding: 10px; margin-top: 5px; }
        button { margin-top: 15px; padding: 10px 20px; }
        .back-link { margin-top: 20px; display: inline-block; }
    </style>
    </head>
    <body>
    <div class="container">
        <h2>Edit Blog</h2>

        <form action="/edit-blog/{{ $blog['id'] }}" method="POST">
        @csrf
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{ $blog['title'] }}" required>

        <label for="content">Content</label>
        <textarea id="content" name="content" rows="6" required>{{ $blog['content'] }}</textarea>

        <button type="submit">Update Blog</button>
        </form>

        <a href="/create-blog" class="back-link">← Back</a>
    </div>
    </body>
    </html>
