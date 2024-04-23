<?php
require_once('config/config.php');
require_once('controller/TransactionController.php');
require_once('controller/ApiController.php');

// Inisialisasi TransactionController
$transactionController = new TransactionController();

// Ambil merchant_id dan references_id dari query string
$merchant_id = $_GET['merchant_id'];
$references_id = $_GET['references_id'];

// Periksa status transaksi
$response = $transactionController->getTransactionStatus($merchant_id, $references_id);

// Kirim respon
ApiController::sendResponse($response);
?>
