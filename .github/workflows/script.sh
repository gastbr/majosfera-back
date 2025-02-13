echo 'Start deploy'

echo 'cd'; cd /var/www/html/majosfera-back

echo 'git pull'; git pull origin prod

echo 'composer install'; composer install

echo 'npm install'; npm install

echo 'npm run build'; npm run build

echo 'artisan route:clear';php artisan route:clear

echo 'php reload';sudo systemctl reload php8.2-fpm

echo 'Deploy completed'