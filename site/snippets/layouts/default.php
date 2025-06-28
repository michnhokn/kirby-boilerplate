<!DOCTYPE html>
<html lang="<?= $kirby->languageCode() ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <?php snippet('seo/head'); ?>
    <?= vite()->css('index.js') ?>
</head>
<body>

<main class="<?= $page->template() ?>">
    <?= $slot ?>
</main>

<?php snippet('seo/schemas'); ?>
<?= vite()->js('index.js') ?>
</body>
</html>