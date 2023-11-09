<h1>Seus Vouchers</h1>

<?php
if (null) {
    echo "<div id='voucher_" . $row['id'] . "'>";
    echo "<p>Nome do evento: " . $row['nome_evento'] . "</p>";
    echo "<p>Data e hora: " . $data_formatada . "</p>";
    echo "<p>Local: " . $row['local'] . "</p>";
    echo "<p class='descricao'> Descrição: " . $row['descricao'] . "</p>";
    echo "<p> Nome do participante: " . $row['nome_participante'] . "</p>";
    echo '<a class="btn btn-danger" id= "voucher_" href="#" onclick="excluirVoucher(' . $row['id'] . ')">Excluir voucher</a>';
    echo "</div>";
} else {
    echo "<tr><td colspan='5'>Você não possui vouchers.</td></tr>";
}
?>