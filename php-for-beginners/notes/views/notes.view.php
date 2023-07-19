<?php require('partials/head.php'); ?>
<?php require('partials/nav.php'); ?>
<?php require('partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul>
            <?php foreach ($notes as $note) : ?>
                <li>
                    <a href="/note?id=<?= $note['id'] ?>" class="block text-blue-500 hover:underline" title="Go to note">
                        <?= $note["body"] ?>
                    </a>
                </li>
            <?php endforeach; ?>

            <hr class="my-4">

            <a href="/notes/create" class="text-blue-500 hover:underline">
                Create note
            </a>
        </ul>
    </div>


</main>

<?php require('partials/footer.php'); ?>