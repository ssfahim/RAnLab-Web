    cd /var/www/ranlab/master
    sudo git clone --branch master <git repo>
    git config --global user.name "username"
    git config --global user.email "user_email"
    sudo cp .env.example .env
    php artisan migrate:refresh --seed
    npm run build


