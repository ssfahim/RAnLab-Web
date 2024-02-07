#!/bin/bash
# git stuff
sudo git add -A 
sudo git stash
sudo git pull origin master

# install composer in master folder
cd /var/www/ranlab/master/
sudo php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
sudo php composer-setup.php
sudo php -r "unlink('composer-setup.php');"
sudo php composer.phar dump-autoload
sudo php composer.phar self-update
sudo php composer.phar update

#laravel stuff
sudo cp .env.example .env
sudo chmod -R 777 ./node_modules/
sudo chmod -R 777 public/build/
npm run build
php artisan migrate:refresh --seed

#sudo php artisan key:generate
#sudo php artisan migrate --seed
#sudo php artisan cache:clear
#sudo php artisan config:clear
#sudo php artisan storage:link

#permission
#sudo chown -R www-data:www-data /var/www/ranlab/master/
#sudo find /var/www/ranlab/master -type f -exec chmod 664 {} \;
#sudo find /var/www/ranlab/master -type d -exec chmod 775 {} \;
#sudo chgrp -R www-data storage bootstrap/cache
#sudo chmod -R ug+rwx storage bootstrap/cache

#   cd /var/www/ranlab/master
#   sudo git clone --branch master https://jon:BlueComm2583@git.bluecommunications.ca/b/RAnlab.git .
#   git config --global user.name "Blue Dev"
#   git config --global user.email "dev@poweredbyb.com"
#   sudo cp .env.example .env
#   php artisan migrate:refresh --seed
#   npm run build
