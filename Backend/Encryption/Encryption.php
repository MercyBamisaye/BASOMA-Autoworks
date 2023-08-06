<?php
class Encryption {

    public function getAESEncrypt(string $plainText): string{
        return openssl_encrypt($plainText,"AES-256-ECB", "BASOMA-Autoworks EDSA Capstone Project");
    }
    public function getAESDecrypt(string $cipherText): string{
        return openssl_decrypt($cipherText,"AES-256-ECB", "BASOMA-Autoworks EDSA Capstone Project");
    }

}

?>