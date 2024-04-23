<?php
require_once('config/config.php');
require_once('controller/TransactionController.php');

// Inisialisasi TransactionController
$transactionController = new TransactionController();

// Periksa jumlah argumen
if (count($argv) < 3) {
    echo "Usage: php transaction-cli.php {references_id} {status}\n";
    exit();
}

// Ambil references_id dan status dari argumen command line
$references_id = $argv[1];
$status = $argv[2];

// Ubah status transaksi
$response = $transactionController->updateTransactionStatus($references_id, $status);

// Tampilkan respon
echo json_encode($response) . "\n";
?>
