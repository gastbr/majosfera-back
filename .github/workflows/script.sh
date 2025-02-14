echo '==> Start deploy'

echo '==> cd'; cd /var/www/html/majosfera-back

echo '==> git pull'; git restore .;git pull origin prod

echo '==> composer install'; sudo -u www-data composer install

echo '==> npm install'; npm install

echo '==> npm run build'; npm run build

echo '==> chown / chmod';
chown -R www-data:www-data /var/www/html/majosfera-back;
chmod -R 755 /var/www/html/majosfera-back;
chmod -R 775 /var/www/html/majosfera-back/storage;
chmod -R 775 /var/www/html/majosfera-back/bootstrap/cache;

echo '==> artisan route:clear'; php artisan route:clear

echo '==> php reload'; systemctl reload php8.3-fpm

echo '==> Deploy completed'