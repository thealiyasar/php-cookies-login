<?php

require 'config.php';

if (isset($_COOKIE['SESSION'])) {
    $cookie_decrypted =  decrypted($_COOKIE['SESSION']);
    $query = $db->prepare("SELECT * FROM users WHERE token = :token");
    $query->execute(array(
        'token' => $cookie_decrypted
    ));
    $row = $query->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        echo 'doğrulama başarısız';     //cookie doğrulama başarısız
        foreach ($_COOKIE as $key => $value) {  // cookie silme
            setcookie($key, $value, time() - 60 * 60 * 24, '/', null, true, true);
        }
        header('Location: login.php');
    }
} else {
    header('Location: login.php');  // cookie yoksa login sayfasına yönlendir
    foreach ($_COOKIE as $key => $value) {  // cookie silme
        setcookie($key, $value, time() - 60 * 60 * 24, '/', null, true, true);
    }
}


if(isset($_POST['cikisyap'])){
    foreach ($_COOKIE as $key => $value) {  // cookie silme
        setcookie($key, $value, time() - 60 * 60 * 24, '/', null, true, true);
    }
    header('Location: login.php');
}
?>


hoşgeldin bea

<br>
<br>
<br>
<br>

<form action="" method="POST">
    <input type="submit" name="cikisyap" value="çıkış yap">
</form>