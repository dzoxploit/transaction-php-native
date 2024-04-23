<?php
require_once('config/config.php');
require_once('controller/TransactionController.php');
require_once('controller/ApiController.php');

// Inisialisasi TransactionController
$transactionController = new TransactionController();

// Ambil data dari body request
$data = json_decode(file_get_contents('php://input'), true);

// Buat transaksi baru
$response = $transactionController->createTransaction($data);

// Kirim respon
ApiController::sendResponse($response);
?>
