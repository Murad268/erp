proyektdə mail konfiqurasiyası istifadə edə bilrəsiniz:

MAIL_MAILER=smtp
MAIL_HOST=smtp.mail.ru
MAIL_PORT=465
MAIL_USERNAME=agamedov94@mail.ru
MAIL_PASSWORD=tX1vdX9Deyp5hJELMAkG
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=agamedov94@mail.ru
MAIL_FROM_NAME="${APP_NAME}"





proyekti klonladıqdan sonrakı addımlar:

1) terminalda composer install komandası işə salınır 
2) proyektin kök yolunda - .env.example faylının yanında .en adlı fayl yaradırıq və .env.example faylının içindəki hər şeyi kopyalayıb .env faylına yapışdırırıq
3) terminalda php artisan key:generate komandası işə salınır
4) .env faylında 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
hissəsinə öz databaza məlumatlarımızı yazırıq DB_DATABASE=laravel hissəsinə yeni yaratmaq istədiyimiz bazanın adını yaza bilərik 
əgər əvvəlcədən bazamız yoxdursa(bu zaman terminalda bu barədə soruşulacaq ki, yeni baza yaradılsın ya yox)
5) lazım gələrsə proyetin içinə atdığım erp.sql faylını import edib istifadə edə bilərsiniz
6) terminalda php artisan migrate komandasını işə salın
7) terminalda php artisan db:seed işə salın
8) terminalda php artisan serve komandasını işə salın 
və proyektimiz işə düşdü
9) hesaba əsas admin kimi daxil olmağı məsləhət görürəm çünki, yeni yaranan adminin hüquqları azdır və əsas admin seeder ilə əlavə edilib giriş məlumatları da yuxarıdakı kimidir
baş admin məlumatları: email: agamedov94@mail.ru şifrə: Esmeresmer55
istifadə

1) Məhsulların alt menyularında müvafiq olaraq məhsulları, tədarükçüləri və kateqoriyaları idarə edə birilik
2) Sifarişlərin alt böçəsindən sifarişlər idarə edilir. Sifariş əlavə edildikdən sonra ən ağdakı səbət hissəsindən siariş üçün məhsulları və seçirik. Əgər məhsul sayı sifarişdən sonra 10-dan aşağı düşərsə o zaman adminlərə bu barədə bildiriş gedir
3) istifadəçilərin alt bölmələrində rolla hissəsində istifadəçi rolları idarə edilir. Rolun ən sağındakı user işarəsinə tıklayanda mövcud səhifələr açılır. Burda da ən sağdakı user ikonuna
tıklayanda biz həmin səhifə üçün rolun icazələrini idarə edə bilərik
4) adminlər hissəsindən adminin rolunu dəyişmək olar. Bura admin əlavə etmək funskionallığı qoymadım. Çünki fikirləşdim ki, qeydiyyat email ilədir və onsuz da email təstiqi varsa, elə
ən yaxşısı adminin manual login səhifəsindən qeydiyyatıdır
5) Finanslardan maliyyə məsələləri idarə edilir - Mailiyyə hesabatı üçün gəlir və xərclər daxil edilməlidir
6) Menunun alt hissəsi də menyuyla əlaqədardır. Və adminə rol verməklə - bu hissəyə admindən başqasının redaktəsinə icazə verməmək düzgün olardı
