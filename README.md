## Apache config

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

## Install project

1. Composer install
