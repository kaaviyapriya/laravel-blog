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
    <h1 class="text-xl font-bold">{{ $post->title }}</h1>
    <button id="darkToggle" class="bg-gray-200 dark:bg-gray-700 p-2 rounded">Toggle Dark Mode</button>
  </header>

  <!-- Blog Post Section -->
<main class="p-4 grid gap-6" style="grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));">

    <article class="bg-white dark:bg-gray-800 shadow rounded-xl overflow-hidden transition hover:shadow-lg">
      <img src="{{ $post->image }}" alt="Blog Image" class="w-full h-48 object-cover brightness-90 hover:brightness-75 transition duration-300">
      <div class="p-4">
        <p class="text-sm text-gray-700 dark:text-gray-300 mb-2">{{ $post->content }}</p>
        <a href="/" class="text-blue-500">Back to posts</a>

    </div>
    </article>
</main>


 
 </body>
</html>
