echo 'Start deploy'

echo 'cd'; cd /var/www/html/majosfera-back

echo 'git pull'; sudo -u www-data git pull origin prod

echo 'npm run build'; sudo -u www-data npm run build

echo 'chown';sudo -u www-data chonw -R www-data:www-data /var/www/html/majosfera-back

echo 'chmod';sudo -u www-data chmod -R 775 /var/www/html/majosfera-back

echo 'artisan route:clear';php artisan route:clear

echo 'php reload';sudo -u www-data systemctl reload php8.2-fpm

echo 'Deploy completed'