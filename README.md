<h1>Proje Kurulumu</h1>
<h3>Teknik Gereksinimler</h3>
<ul>
    <li>Docker</li>
</ul>

<h3>Projenin Çalıştırılması</h3>
Son olarak projeyi ayağa kaldırabilmek için,
eğer Symfony CLI kullanıyorsanız aşağıdaki komutu çalıştırarak projeyi ayağa kaldırabilirsiniz.
<pre>
docker compose build
docker compose up -d
</pre>

<h3>Bağımlıkların Yüklenmesi</h3>
Öncelikle projenin bağımlılıklarını yükleyelim.

<pre>docker compose exec api composer install</pre>

<h3>Tabloların Oluşturulması</h3>
Gerekli veritabanı ayarlarını yapılandırdıktan sonra projenin çalışabilmesi için veritabanı tablolarımızı oluşturalım.
<pre>
docker compose exec api php bin/console make:migration
docker compose exec api php bin/console doctrine:migrations:migrate
</pre>

<h3>Demo Verilerin Eklenmesi</h3>
Veritabanımızda oluşturulan tablolarımızın içini demo veriler ile dolduralım.
<pre>
docker compose exec api php bin/console doctrine:fixtures:load
</pre>

<h3>Projemiz Hazır</h3>
Proje içerisinde yer alan Postman Collection'u import ederek projeyi test edebilirsiniz.