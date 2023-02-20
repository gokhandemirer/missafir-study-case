<h1>Proje Kurulumu</h1>
<h3>Teknik Gereksinimler</h3>
<ul>
    <li>PHP 8.1(Ctype, iconv, JSON, PCRE, Session, SimpleXML ve Tokenizer)</li>
    <li>Composer</li>
    <li>Symfony CLI</li>
</ul>
<h3>Bağımlıkların Yüklenmesi</h3>
Öncelikle projenin bağımlılıklarını yükleyelim.

<pre>composer install</pre>

<h3>Veritabanı Konfigürasyonu</h3>
<strong>.env</strong> dosyamızda veritabanı ayarlarını yapılandıralım.

Mevcut hali şu şekilde; 
<pre>DATABASE_URL="mysql://root:root@127.0.0.1:3306/missafir?serverVersion=8.0&charset=utf8"</pre>
Burada belirlediğimiz veritabanını kendi local ortamımızda oluşturalım.

<h3>Tabloların Oluşturulması</h3>
Gerekli veritabanı ayarlarını yapılandırdıktan sonra projenin çalışabilmesi için veritabanı tablolarımızı oluşturalım.
<pre>
php bin/console make:migration
php bin/console doctrine:migrations:migrate
</pre>

<h3>Demo Verilerin Eklenmesi</h3>
Veritabanımızda oluşturulan tablolarımızın içini demo veriler ile dolduralım.
<pre>
php bin/console doctrine:fixtures:load
</pre>

<h3>Projenin Çalıştırılması</h3>
Son olarak projeyi ayağa kaldırabilmek için,
eğer Symfony CLI kullanıyorsanız aşağıdaki komutu çalıştırarak projeyi ayağa kaldırabilirsiniz.
<pre>symfony server:start</pre>

<h3>Projemiz Hazır</h3>
Proje içerisinde yer alan Postman Collection'u import ederek projeyi test edebilirsiniz.