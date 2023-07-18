<?php require('partials/head.php'); ?>
<?php require('partials/nav.php'); ?>
<?php require('partials/banner.php'); ?>

<main class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <a href="/" class="text-blue-500 hover:underline">&larr; Go back</a>
    <p class="my-4"><?= $note["body"] ?></p>
</main>

<?php require('partials/footer.php'); ?>