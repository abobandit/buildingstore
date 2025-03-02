Это веб-приложение было сделано на заказ для одного моего клиента, так как в тестовое задание схоже с его заданием, я решил с небольшими правками  показать вам эту работу
ИНСТРУКЦИЯ ПО РАЗВОРОТУ БЭКА:
git clone https://github.com/abobandit/buildingstore.git
cd buildingstore
git checkout tech-zadanie
composer i
создать .env из .env.example
php artisan migrate (предложит создать бд, введите yes)
php artisan db:seed 
