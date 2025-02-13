echo 'Start deploy'

echo 'cd'

cd /var/www/html/majosfera-back

echo 'git pull'

sudo -u www-data git pull origin prod

echo 'artisan route:clear'

php artisan route:clear

echo 'php reload'

sudo systemctl reload php8.2-fpm

echo 'npm install'

sudo -u www-data npm install

echo 'npm run build'

sudo -u www-data npm run build

echo 'Deploy completed'