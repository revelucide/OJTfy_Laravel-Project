<div class="section-header" style="display: flex; justify-content: space-between; align-items: center;">
  <h2>📝 My Tasks</h2>
  <button id="add-task-btn" class="add-task-btn">＋ Add Task</button>
</div>

<div class="task-list">
  @if(session('tasks') && count(session('tasks')) > 0)
    @foreach(session('tasks') as $index => $task)
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <form method="POST" action="/toggle-task/{{ $index }}" style="margin: 0;">
          @csrf
          <input type="checkbox" onchange="this.form.submit()" {{ $task['completed'] ? 'checked' : '' }} style="margin-right: 10px;">
        </form>
        <span style="{{ $task['completed'] ? 'text-decoration: line-through; color: gray;' : '' }}">
          {{ $task['title'] }}
        </span>
      </div>
    @endforeach
  @else
    <p style="color: gray;">No tasks yet. Click “＋ Add Task” to begin.</p>
  @endif
</div>

<!-- Hidden form for adding task -->
<div id="task-form-container" style="display: none; margin-top: 20px;">
  <form id="task-form">
    @csrf
    <input type="text" id="task-input" name="task" placeholder="Enter task..." required style="padding: 8px; width: 250px;">
    <button type="submit" class="add-task-btn">Save Task</button>
  </form>
</div>

<script>
  // Toggle task form visibility
  document.getElementById('add-task-btn').addEventListener('click', function () {
    const formContainer = document.getElementById('task-form-container');
    formContainer.style.display = formContainer.style.display === 'none' ? 'block' : 'none';
    document.getElementById('task-input').focus();
  });

  // Submit task form via AJAX
  document.getElementById('task-form').addEventListener('submit', function (e) {
    e.preventDefault();

    const task = document.getElementById('task-input').value;

    fetch('/add-task', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify({ task })
    })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        location.reload();
      } else {
        alert('Failed to add task.');
      }
    })
    .catch(error => {
      console.error('Error adding task:', error);
    });
  });
</script>
