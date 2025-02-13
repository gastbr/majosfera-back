echo 'Start deploy'

echo 'cd'; cd /var/www/html/majosfera-back

echo 'git pull'; git restore .;git pull origin prod

echo 'composer install'; sudo -u gaston composer install

echo 'npm install'; npm install

echo 'npm run build'; npm run build

echo 'chown/chmod'; chown -R www-data:www-data /var/www/html/majosfera-back; chmod -R 777 /var/www/html/majosfera-back

echo 'artisan route:clear'; php artisan route:clear

echo 'php reload'; systemctl reload php8.2-fpm

echo 'Deploy completed'