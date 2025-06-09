<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Simple Blog</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    // Enable dark mode support
    tailwind.config = {
      darkMode: 'class',
    }
  </script>
</head>
<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-all duration-300">

  <!-- Navbar with Dark Mode Toggle -->
  <header class="p-4 flex justify-between items-center shadow-md bg-white dark:bg-gray-800">
    <h1 class="text-xl font-bold">My Blog</h1>
    <button id="darkToggle" class="bg-gray-200 dark:bg-gray-700 p-2 rounded">Toggle Dark Mode</button>
  </header>

  <!-- Blog Post Section -->
<main class="p-4 grid gap-6" style="grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));">

  @foreach ($posts as $post)
    <article class="bg-white dark:bg-gray-800 shadow rounded-xl overflow-hidden transition hover:shadow-lg">
      <img src="{{ $post->image }}" alt="Blog Image" class="w-full h-48 object-cover brightness-90 hover:brightness-75 transition duration-300">
      <div class="p-4">
        <h2 class="text-lg font-semibold mb-2">{{ $post->title }}</h2>
        <p class="text-sm text-gray-700 dark:text-gray-300 mb-2">{{ Str::limit($post->description, 100) }}</p>
        <a href="/post/{{ $post->id }}" class="text-blue-500 hover:underline">Read More</a>
      </div>
    </article>
  @endforeach
</main>


  <!-- Comment Section -->
  <section class="max-w-xl mx-auto mt-10 p-4 bg-gray-100 dark:bg-gray-800 rounded-xl shadow">
    <h2 class="text-xl font-semibold mb-4">Leave a Comment</h2>
    <form id="commentForm" class="space-y-4">
      <input type="text" id="username" placeholder="Your name" class="w-full p-2 rounded bg-white dark:bg-gray-700 border dark:border-gray-600" required>
      <textarea id="comment" placeholder="Your comment" rows="4" class="w-full p-2 rounded bg-white dark:bg-gray-700 border dark:border-gray-600" required></textarea>
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Post Comment</button>
    </form>
    <div id="comments" class="mt-6 space-y-3">
      <!-- Comments will appear here -->
    </div>
  </section>

  <!-- JavaScript -->
  <script>
    // Dark Mode Toggle
    const darkToggle = document.getElementById('darkToggle');
    darkToggle.addEventListener('click', () => {
      document.documentElement.classList.toggle('dark');
    });

    // AJAX Comment Submission
    const commentForm = document.getElementById('commentForm');
    const commentsDiv = document.getElementById('comments');

    commentForm.addEventListener('submit', function (e) {
      e.preventDefault();

      const username = document.getElementById('username').value;
      const comment = document.getElementById('comment').value;

      if (!username || !comment) return;

      // Simulate AJAX by directly adding comment (replace with fetch if backend exists)
      const newComment = document.createElement('div');
      newComment.classList = "p-3 bg-white dark:bg-gray-700 rounded shadow";
      newComment.innerHTML = `<strong>${username}</strong><p>${comment}</p>`;

      commentsDiv.prepend(newComment);

      // Clear form
      commentForm.reset();
    });
  </script>
</body>
</html>
