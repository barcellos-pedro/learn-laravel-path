<?php
$heading = "404 - Page not found";
require base_path("views/partials/head.php");
?>

<main class="h-screen flex flex-col items-center justify-center">
    <h1 class="text-2xl font-bold">Sorry. Page not found</h1>
    <a href="/" class="bg-black px-4 py-2 rounded text-white my-3 font-bold md:hover:-translate-y-1 duration-300 ease">
        Back to home
    </a>
</main>

<?php require base_path('views/partials/footer.php'); ?>