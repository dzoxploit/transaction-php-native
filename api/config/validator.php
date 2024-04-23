<?php
// Validator.php

class Validator {
    private $data;
    private $errors = [];

    public function __construct($data) {
        $this->data = $data;
    }

    public function required($fields) {
        foreach ($fields as $field) {
            if (empty($this->data[$field])) {
                $this->addError("$field is required.");
            }
        }
    }

    public function addError($message) {
        $this->errors[] = $message;
    }

    public function hasErrors() {
        return !empty($this->errors);
    }

    public function getErrors() {
        return $this->errors;
    }
}
?>
