<?php
class Helper {
    // Method untuk mengenerate custom invoice ID
    public static function generateInvoiceID() {
        // Contoh implementasi: tanggal sekarang + angka random
        return date('YmdHis') . rand(1000, 9999);
    }

    // Method untuk mengenerate number VA
    public static function generateNumberVA() {
        // Contoh implementasi: angka random
        return rand(1000000000, 9999999999);
    }
}
?>
