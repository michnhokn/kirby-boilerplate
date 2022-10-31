<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <title><?= h($site->title()) ?></title>
    <?= vite()->css() ?>
</head>
<body>
<?php slot() ?>
<?php endslot() ?>
<?= vite()->js() ?>
</body>
</html>