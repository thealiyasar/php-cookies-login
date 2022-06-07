# TR
 
Genel olarak giriş yapılırken bir cookie oluşturuyoruz. Bu cookie'nin değeri kullanıcının token değeri oluyor bunu da openssl_encrypt ile şifreliyoruz.
Giriş yapılınca index.php ye gidiyor. Httponly true yaparak cookie oluşturduğumuz için Xss tarafında cookie gözükmüyor. Biz her türlü kontrolü sağlıyoruz. Sayfa yenilemelerde tekrar cookie kontrolü sağlıyoruz. Veritabanında  kayıtlı değilse yada eşleşmiyorsa bütün cookie leri foreach ile silip login.php ye yolluyoruz. Giriş yapıldıktan sonra login.php ye gitmeye çalışırsa kontrol onu index.php ye gönderiyor. Console'dan cookie oluştursada veritabanı kaydı ile eşleşemeyeceği için otomatikten  bütün cookieleri silip onu login.php ye postalıyoruz.

#### Güvenlik

Cookie manipüle edilebilir birşey olduğu için ekstra önlemler alınabilir. Mesela her sayfa açılışında kontrol sağlanabilir yada her post işleminde kontrol sağlanabilir. Bu ne kadar paranoyak olduğunuza bağlı. Ben her sayfa açılışında kontrol edilen bir örnek ekledim zaten. Geri kalanı sizin sisteminize nasıl entegre edeceğinize bağlı.

Mutlu Kalın.






# EN 

In general, we create a cookie when logging in. The value of this cookie is the token value of the user, and we encrypt it with openssl_encrypt.
When logged in, it goes to index.php. Cookie does not appear on the Xss side because we created a cookie by making httpnly true. We provide all kinds of control. We provide cookie control again on page refreshes. If they are not registered in the database or do not match, we delete all cookies with foreach and send them to login.php. If it tries to go to login.php after login, control sends it to index.php. Although it creates a cookie from the console, since it cannot match the database record, we automatically delete all cookies and send it to login.php.

#### Security

Since the cookie is something that can be manipulated, extra precautions can be taken. For example, control can be provided at every page opening or control can be provided at every post process. It depends on how paranoid you are. I have already added an example that is checked at every page opening. The rest depends on how you integrate it into your system.

Stay happy.
