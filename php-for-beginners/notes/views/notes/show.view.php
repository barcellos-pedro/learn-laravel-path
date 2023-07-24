<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <a href="/notes" class="text-blue-500 hover:underline">&larr; Go back</a>
    <p class="my-4"><?= htmlspecialchars($note["body"]) ?></p>
    <!-- POST to the current URL /note?id=<id> -->
    <form method="POST" name="deleteNote">
        <input type="hidden" name="_method" aria-hidden="true" value="DELETE">
        <input type="hidden" name="id" aria-hidden="true" value="<?= $note['id'] ?>">
        <button type="submit" class="bg-red-500 py-2 px-4 font-semibold text-white text-sm rounded hover:bg-red-600">Delete</button>
    </form>
</main>

<?php require base_path('views/partials/footer.php'); ?>