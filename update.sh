php artisan down
git pull
chmod -R 755 storage/* bootstrap/cache
composer update --no-dev --optimize-autoloader --no-interaction
nvm use 16.17.1
npm i
npm run build
php artisan migrate
php artisan view:clear
php artisan config:clear
php artisan cache:clear
chown -R www-data:www-data /var/www/services/script-save/*
php artisan queue:restart
php artisan up