# Annotations

## run stack

```
docker-compose up
```

## Test MySQL from host

```
mysql -h 127.0.0.1 -P 3307 -u root
```

## Import inicial

```
mysql -h 127.0.0.1 -P 3307 -u root symfony < data/demo_mvc.sql
```


docker-compose run php-fpm apt-get update && apt-get install -y libpng12-dev libjpeg-dev libpq-dev && docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr && docker-php-ext-install gd mbstring pdo pdo_mysql pdo_pgsql