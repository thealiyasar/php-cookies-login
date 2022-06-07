<?php
require  'config.php';

// submit
if (isset($_POST['submit'])) { 
    $query = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $query->execute(array(
        'email' => $_POST['mail'],
        'password' => md5($_POST['pass'])
    ));
    $row = $query->fetch(PDO::FETCH_ASSOC);

    if ($row['email'] == $_POST['mail'] && $row['password'] == md5($_POST['pass'])) {
        if (!isset($_COOKIE['SESSION'])) {
            setcookie("SESSION", encrypted($row['token']), time() + 60 * 60 * 24, '/', null, true, true);
        } 
        header('Location: index.php');
        
    } else {
        echo '<div class="alert alert-danger">
        <strong>Hata!</strong> Kullanıcı adı veya şifre yanlış.
        </div>';
    }
}

//cookie kontrol

if(isset($_COOKIE['SESSION'])){
    $cookie_decrypted =  decrypted($_COOKIE['SESSION']); 
    $query = $db->prepare("SELECT * FROM users WHERE token = :token");
    $query->execute(array(
        'token' => $cookie_decrypted
    ));
    $row = $query->fetch(PDO::FETCH_ASSOC);

    if($row){   //cookie doğrulama başarılı
        header('Location: index.php');
    }else{  // cookie doğrulama başarısız
        foreach ($_COOKIE as $key => $value) {
            setcookie($key, $value, time() - 60 * 60 * 24, '/', null, true, true);
        }  // cookie silme
    }
}else{ 
    foreach ($_COOKIE as $key => $value) {  // cookie silme
        setcookie($key, $value, time() - 60 * 60 * 24, '/', null, true, true);
    }
} 
?>

<form action="" method="post">
    <input type="text" name="mail">
    <input type="text" name="pass">
    <input type="submit" name="submit" value="Giriş Yap">
</form>