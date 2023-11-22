<!DOCTYPE html>
<html>



<head>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <title>Vouchers</title>

</head>

<body>
    <h1>Seus Vouchers</h1>
    <?php 
    foreach ($vouchers as $voucher) : {
            echo "Voucher ID: " . $voucher->id;
            echo "<br>";
            echo "Evento: " . $voucher->event_id;
            echo "<br>";
            echo "Usuário: " . $voucher->user_id;
            echo "<br>";
        }
    endforeach;

    ?>

</body>

</html>