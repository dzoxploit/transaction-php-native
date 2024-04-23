<?php
class ApiController {
    // Method untuk mengirimkan respon JSON dengan status kode HTTP
    public static function sendResponse($data, $httpStatusCode = 200) {
        // Set header untuk JSON response
        header('Content-Type: application/json');
        // Set status kode HTTP
        http_response_code($httpStatusCode);
        // Encode data menjadi JSON dan kirimkan
        echo json_encode($data);
        // Stop eksekusi script setelah mengirim respon
        exit();
    }

    // Method untuk mengirimkan respon error JSON dengan status kode HTTP 400
    public static function sendError($message) {
        self::sendResponse(['error' => $message], 400);
    }
}
?>
