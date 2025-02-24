echo '==> Start deploy'

echo '==> cd'; cd /var/www/html/majosfera-back

echo '==> git pull'; git restore .;git pull origin prod

echo '==> composer install'; sudo -u www-data composer install

echo '==> chown / chmod';
chown -R www-data:www-data /var/www/html/majosfera-back;
chmod -R 755 /var/www/html/majosfera-back;
chmod -R 775 /var/www/html/majosfera-back/storage;
chmod -R 775 /var/www/html/majosfera-back/bootstrap/cache;

echo '==> migrate / seed'; php artisan migrate:fresh --seed

echo '==> artisan -:clear'; php artisan route:clear; php artisan config:clear; php artisan cache:clear; 

echo '==> php reload'; systemctl reload php8.3-fpm

echo '==> Deploy completed'