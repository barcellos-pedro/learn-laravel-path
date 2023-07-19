<?php
$heading = "403 - Forbidden";
require "partials/head.php";
?>

<main class="h-screen flex flex-col items-center justify-center">
    <h1 class="text-2xl font-bold">You are not authorized to view this page.</h1>
    <a href="/" class="bg-black px-4 py-2 rounded text-white my-3 font-bold md:hover:-translate-y-1 duration-300 ease">
        Back to home
    </a>
</main>

<?php require('views/partials/footer.php'); ?>