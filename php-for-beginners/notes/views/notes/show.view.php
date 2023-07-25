<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <a href="/notes" class="text-blue-500 hover:underline">&larr; Go back</a>
    <p class="my-4"><?= htmlspecialchars($note["body"]) ?></p>
    <a href="/note/edit?id=<?= $note['id'] ?>" class="bg-blue-500 py-2 px-4 font-semibold text-white text-sm rounded hover:bg-blue-600">
        Edit
    </a>
</main>

<?php require base_path('views/partials/footer.php'); ?>