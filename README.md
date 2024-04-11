## Apache config
```
<VirtualHost *:80>
    ServerName www.ui42.local
    DocumentRoot /var/www/UI42/public
    Options Indexes FollowSymLinks
    
    <Directory "/var/www/UI42/public">
    AllowOverride All
    <IfVersion < 2.4>
    Allow from all
    </IfVersion>
    <IfVersion >= 2.4>
    Require all granted
    </IfVersion>
    </Directory>
    
    ErrorLog /var/log/apache2/error.log
    CustomLog /var/log/apache2/access.log combined
</VirtualHost>
```
## Install project

<p>Point 7-8 need time for parse data</p>

1. composer install
2. npm install
3. configurate .env (rename .env.example to .env)
4. php artisan migrate
5. php artisan key:generate
6. npm run dev
7. php artisan data:import
8. php artisan data:geocode
9. php artisan storage:link
