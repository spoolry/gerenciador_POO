<!DOCTYPE html>
<html>



<head>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <h1>Seus Vouchers</h1>
</head>


<?php

if (empty($vouchers)) {
    echo 'Você não possui vouchers.';
} else {
    foreach ($vouchers as $voucher) {
        "Voucher ID: " . $voucher->id . "<br>";
        echo "Evento: " . $voucher->event_id . "<br>";
        echo "Usuário: " . $voucher->user_id . "<br>";
        echo "<br>";
    }
}

?>