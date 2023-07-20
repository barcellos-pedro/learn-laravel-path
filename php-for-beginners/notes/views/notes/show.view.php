<?php require('views/partials/head.php'); ?>
<?php require('views/partials/nav.php'); ?>
<?php require('views/partials/banner.php'); ?>

<main class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <a href="/notes" class="text-blue-500 hover:underline">&larr; Go back</a>
    <p class="my-4"><?= htmlspecialchars($note["body"]) ?></p>
</main>

<?php require('partials/footer.php'); ?>