<?php
// db/seeder.php

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../model/TransactionModel.php');

// Buat koneksi ke database
$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Periksa koneksi
if ($db->connect_errno) {
    die("Failed to connect to MySQL: " . $db->connect_error);
}

// Inisialisasi objek model transaksi
$transactionModel = new TransactionModel($db);

// Data dummy untuk dimasukkan ke dalam database
$dummyData = [
    [
        'invoice_id' => 'INV001',
        'item_name' => 'Product A',
        'amount' => 100,
        'payment_type' => 'virtual_account',
        'customer_name' => 'John Doe',
        'merchant_id' => 'MERCHANT001',
        'references_id' => generateReferenceId(),
        'status' => 'Pending'
    ],
    [
        'invoice_id' => 'INV002',
        'item_name' => 'Product B',
        'amount' => 150,
        'payment_type' => 'credit_card',
        'customer_name' => 'Jane Smith',
        'merchant_id' => 'MERCHANT002',
        'references_id' => generateReferenceId(),
        'status' => 'Pending'
    ]
    // Tambahkan data dummy lainnya di sini
];

// Fungsi untuk menghasilkan reference ID secara acak
function generateReferenceId() {
    return 'REF' . uniqid();
}

// Iterasi data dummy dan masukkan ke dalam database
foreach ($dummyData as $data) {
    $transactionModel->create($data);
}

echo "Dummy data has been seeded successfully.\n";

// Tutup koneksi ke database
$db->close();
?>
