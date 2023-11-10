<h1>Seus Vouchers</h1>

<?php
if (empty($vouchers)) {
    echo 'Você não possui vouchers.';
} else {
    foreach ($vouchers as $voucher) {
        echo "Voucher ID: " . $voucher->id . "<br>";
        echo "Evento: " . $voucher->event_name . "<br>";
        echo "Usuário: " . $voucher->user_name . "<br>";
        echo "<br>";
    }
}

?>