<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 p-6">
    <form name="note" method="POST" action="/note" class="flex flex-col justify-center items-start gap-2 max-w-xl mx-auto">
        <label for="body" class="font-bold text-xl">What you want to say?</label>
        <textarea name="body" id="body" cols="65%" rows="10" class="resize-none mt-2 p-1 rounded border border-gray-300" required><?= $note['body'] ?></textarea>

        <input type="hidden" aria-hidden="true" name="_method" value="PATCH">
        <input type="hidden" aria-hidden="true" name="id" value="<?= $note['id'] ?>">

        <?php if (isset($errors['body'])) : ?>
            <ul class="list-disc pl-4">
                <li class="text-red-500 font-bold"><?= $errors['body'] ?></li>
            </ul>
        <?php endif; ?>


        <div class="flex items-center justify-end gap-3 w-full">
            <button type="submit" class="py-2 px-4 bg-blue-500 rounded text-white font-semibold text-sm hover:bg-blue-600">Update</button>
            <a href="/note?id=<?= $note['id'] ?>" class="py-2 px-4 bg-gray-200 rounded border text-black font-semibold text-sm hover:bg-gray-300 justify-self-end">Cancel</a>
        </div>
    </form>
</main>

<?php require base_path('views/partials/footer.php'); ?>