<?php $this->extend('sidebar') ?>
<?php $this->section('navbar') ?>

<!DOCTYPE html>
<html>



<head>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <meta charset="UTF-8">
    <link rel="icon" href="/img/icone.png" />
    <title>V&G Events</title>
    <link rel="stylesheet" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="dashboard">

        <h1>Seus Vouchers</h1>
        <br>
        <?php

        if (empty($vouchers)) {
            echo 'Você não possui vouchers.';
        } else {
            foreach ($vouchers as $voucher) {
                echo "Voucher: " . $voucher->id;
                echo "<br>";
                echo "Evento: " . $voucher->event_name;
                echo "<br>";
                echo "<br>";
            }
        }
        ?>

        <?php $this->endSection() ?>
    </div>
</body>