<?php
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../config/validator.php');
require_once(__DIR__ . '/../model/TransactionModel.php');

class TransactionController {
    
    private $transactionModel;

    public function __construct() {
        $this->transactionModel = new TransactionModel();
    }

    // Method untuk membuat transaksi pembayaran
    public function createTransaction($data) {
         // Validasi input data
        $validator = new Validator($data);
        $validator->required(['invoice_id', 'item_name', 'amount', 'payment_type', 'customer_name', 'merchant_id']);
        if ($validator->hasErrors()) {
            return ['error' => 'All fields are required.'];
        }
        // Validasi input data (contoh sederhana, sesuaikan dengan kebutuhan)
        if(empty($data['invoice_id']) || empty($data['item_name']) || empty($data['amount']) || empty($data['payment_type']) || empty($data['customer_name']) || empty($data['merchant_id'])) {
            return ['error' => 'All fields are required.'];
        }

        // Panggil model untuk menyimpan data transaksi
        return $this->transactionModel->create($data);
    }

    // Method untuk mengambil status transaksi terakhir berdasarkan merchant_id dan references_id
    public function getTransactionStatus($merchant_id, $references_id) {
        // Panggil model untuk mengambil status transaksi terakhir
        return $this->transactionModel->getStatus($merchant_id, $references_id);
    }

    // Method untuk mengubah status transaksi berdasarkan references_id
    public function updateTransactionStatus($references_id, $status) {
        // Panggil model untuk mengubah status transaksi
        return $this->transactionModel->updateStatus($references_id, $status);
    }
}
?>
