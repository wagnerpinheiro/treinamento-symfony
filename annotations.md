# Annotations

## Env

### Run stack

```
docker-compose up
docker-compose start
```

### Run MySQL from host

```
mysql -h 127.0.0.1 -P 3307 -u root
```

### Import inicial

```
mysql -h 127.0.0.1 -P 3307 -u root symfony < data/demo_mvc.sql
```

---------------

## Symfony

### 3. Init app

create branch:
```
git checkout -b hotfix/03-my-init-app
```

3.1 - Console:

```
mkdir demo_sf
cd demo_sf
composer init
# symfony/symfony1
# swiftmailer/swiftmailer

vim composer.json

#"config": {
#        "vendor-dir": "lib/vendor"
#    },

composer install
php lib/vendor/symfony/symfony1/data/bin/symfony generate:project demo_sf --orm=Propel
php symfony -V
sudo php symfony project:permissions
```


3.2 - gerando app:

```
ls web
php symfony generate:app frontend
ls web

http://localhost:81/demo_sf/web/

http://localhost:81/demo_sf/web/frontend_dev.php

# ativa o dev
vim web/frontend_dev.php 
http://localhost:81/demo_sf/web/frontend_dev.php

# alterar o autoload
vim config/ProjectConfiguration.class.php
# require_once __DIR__.'/../lib/vendor/autoload.php';

http://localhost:81/demo_sf/web/frontend_dev.php

php symfony plugin:publish-assets
cp lib/vendor/symfony/symfony1/data/web/sf web/ -rf

http://localhost:81/demo_sf/web/frontend_dev.php
```


3.3 - gerando um modulo:

```
ls apps/frontend/modules/
php symfony generate:module frontend main
ls -R apps/frontend/modules/

http://localhost:81/demo_sf/web/frontend_dev.php/main/index

vim apps/frontend/modules/main/actions/actions.class.php
# $this->hello = 'Hello World!';
vim apps/frontend/modules/main/templates/indexSuccess.php
# <?=$hello?>

http://localhost:81/demo_sf/web/frontend_dev.php/main/index

vim apps/frontend/config/routing.yml

http://localhost:81/demo_sf/web/frontend_dev.php
```

Commit All!


### 4. Model

4.1 - Definindo o DB:

```
php symfony configure:database "mysql:host=127.0.0.1;dbname=symfony" root
vim config/databases.yml
```


--------------

## Manutenção

### Remove all containers

```
docker stop $(docker ps -a -q)
docker rm $(docker ps -a -q)
```

### Remove all images

```
docker rmi $(docker images -q)
```