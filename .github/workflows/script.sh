echo "Start deploy"

cd /var/www/html/majosfera-back

git pull origin prod

php artisan route:clear

sudo service php8.3-fpm reload

npm run build

echo "Deploy completed"