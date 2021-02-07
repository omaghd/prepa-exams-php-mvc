<?php
foreach ($data as $key => $value) ${$key} = $value;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ? $title . ' | ' . SITENAME : SITENAME ?></title>
    <link rel="stylesheet" href="<?= URLROOT . '/assets/bootstrap/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= URLROOT . '/assets/font-awesome/css/font-awesome.min.css' ?>">
    <link rel="stylesheet" href="<?= URLROOT . '/assets/sweetalert/css/sweetalert2.min.css' ?>">
    <link rel="stylesheet" href="<?= URLROOT . '/assets/custom/css/app.css' ?>">
</head>