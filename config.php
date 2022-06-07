<?php 
// encrypted define
define('CIPHER', 'AES-128-CBC');
define('KEY', 'A@aZqw|asd142!@asd');
// encrypted data
function encrypted($data)
{
    $iv = substr(hash('sha256', KEY), 0, 16);
    return openssl_encrypt($data, CIPHER, KEY, 0, $iv);
}
// decrypted data
function decrypted($data)
{
    $iv = substr(hash('sha256', KEY), 0, 16);
    return openssl_decrypt($data, CIPHER, KEY, 0, $iv);
}

// database
try {
    $dbname = 'deneme';
    $username = 'root';
    $password = '';
    global $db;
    $db = new PDO('mysql:host=localhost; dbname=' . $dbname . '; charset=utf8', '' . $username . '', '' . $password . '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
 

?>