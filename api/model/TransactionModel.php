<?php
require_once('../config/config.php');
require_once('../helpers/helper.php');

class TransactionModel {
    private $mysqli;

    public function __construct() {
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    // Method untuk membuat transaksi pembayaran baru
    public function create($data) {
        // Generate references_id
        $references_id = uniqid();

        // Generate custom invoice ID
        $invoice_id = Helper::generateInvoiceID();

        // Generate number_va for virtual account payment type
        $number_va = null;
        if ($data['payment_type'] === 'virtual_account') {
            $number_va = Helper::generateNumberVA();
        }

        // Query untuk menyimpan data transaksi
        $query = "INSERT INTO transactions (invoice_id, item_name, amount, payment_type, customer_name, merchant_id, references_id, number_va) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare statement
        $stmt = $this->mysqli->prepare($query);
        if (!$stmt) {
            return ['error' => 'Failed to prepare statement.'];
        }

        // Bind parameters
        $stmt->bind_param('ssdssiss', $invoice_id, $data['item_name'], $data['amount'], $data['payment_type'], $data['customer_name'], $data['merchant_id'], $references_id, $number_va);

        // Execute query
        if (!$stmt->execute()) {
            return ['error' => 'Failed to create transaction.'];
        }

        // Return references_id and number_va
        return ['references_id' => $references_id, 'number_va' => $number_va, 'status' => 'Pending'];
    }

     // Method untuk mengambil status transaksi terakhir berdasarkan merchant_id dan references_id
    public function getStatus($merchant_id, $references_id) {
        // Query untuk mengambil status transaksi terakhir
        $query = "SELECT references_id, invoice_id, status FROM transactions WHERE merchant_id = ? AND references_id = ? ORDER BY updated_at DESC LIMIT 1";

        // Prepare statement
        $stmt = $this->mysqli->prepare($query);
        if (!$stmt) {
            return ['error' => 'Failed to prepare statement.'];
        }

        // Bind parameters
        $stmt->bind_param('is', $merchant_id, $references_id);

        // Execute query
        if (!$stmt->execute()) {
            return ['error' => 'Failed to execute query.'];
        }

        // Bind result variables
        $stmt->bind_result($references_id, $invoice_id, $status);

        // Fetch result
        $stmt->fetch();

        // Close statement
        $stmt->close();

        // Return result
        return ['references_id' => $references_id, 'invoice_id' => $invoice_id, 'status' => $status];
    }

    // Method untuk mengubah status transaksi berdasarkan references_id
    public function updateStatus($references_id, $status) {
        // Query untuk mengubah status transaksi
        $query = "UPDATE transactions SET status = ? WHERE references_id = ?";

        // Prepare statement
        $stmt = $this->mysqli->prepare($query);
        if (!$stmt) {
            return ['error' => 'Failed to prepare statement.'];
        }

        // Bind parameters
        $stmt->bind_param('ss', $status, $references_id);

        // Execute query
        if (!$stmt->execute()) {
            return ['error' => 'Failed to update transaction status.'];
        }

        // Close statement
        $stmt->close();

        // Return success message
        return ['message' => 'Transaction status updated successfully.'];
    }
}
?>
