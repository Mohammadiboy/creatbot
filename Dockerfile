# استفاده از نسخه رسمی PHP
FROM php:8.1-apache

# کپی کردن فایل‌های پروژه به سرور
COPY . /var/www/html/

# فعال کردن ماژول‌های مورد نیاز (در صورت نیاز)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# پورت پیش‌فرض
EXPOSE 80
