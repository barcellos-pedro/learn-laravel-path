<?php require('partials/head.php'); ?>
<?php require('partials/nav.php'); ?>
<?php require('partials/banner.php'); ?>

<main class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 p-6">
    <!-- POST to the current URL /notes/create -->
    <form name="note" method="POST" class="flex flex-col justify-center items-start gap-2">
        <label for="body" class="font-bold text-xl">What you want to say?</label>
        <textarea name="body" id="body" cols="80%" rows="10" class="resize-none mt-2 rounded border border-gray-300" required></textarea>
        <button type="submit" class="mt-2 px-4 py-2 rounded bg-blue-500 text-white font-bold hover:bg-blue-600">Create</button>
    </form>
</main>

<?php require('partials/footer.php'); ?>