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

create branch:
```
git checkout -b hotfix/04-my-model
```

4.1 - Definindo o DB:

```
php symfony configure:database "mysql:host=mysql;port=3306;dbname=symfony" root
php symfony configure:database "mysql:host=127.0.0.1;port=3307;dbname=symfony" root --env="cli"
vim config/databases.yml
```

4.2 - definindo o schema
```
php symfony propel:build-schema
vim config/schema.yml
```

4.3 - Criando as tabelas
```
php symfony propel:build-sql
vim data/sql/lib.model.schema.sql
# php symfony propel:insert-sql
```

4.4 - gerando as classes do modelo
```
php symfony propel:build-model
ls -R lib/model/
vim lib/model/map/FuncionariosTableMap.php
vim lib/model/om/BaseFuncionarios.php
vim lib/model/om/BaseFuncionariosPeer.php
vim lib/model/Funcionarios.php
```

Add regra de negócio:
```
public function setEmail($v) {
    if(!preg_match('/.*@.*/', $v)){
        throw new Exception('Email Inválido');
    }
    parent::setEmail($v);
}
```


```
vim lib/model/FuncionariosPeer.php
```

Add query:
```
public static function doListFuncionarios(\Criteria $criteria = null, \PropelPDO $con = null) {
    if($criteria){
        $c = clone $criteria;
    }else{
        $c = new Criteria(self::TABLE_NAME);
    }
    
    $c->addJoin(DepartamentosPeer::ID, FuncionariosPeer::DEPARTAMENTO_ID);
    $c->add(FuncionariosPeer::NOME, null, Criteria::ISNOTNULL);
    $c->addAscendingOrderByColumn(FuncionariosPeer::NOME);
    
    return self::doSelect($c, $con);        
}
```

Commit All!

### 5. Controller

git checkout -b hotfix/05-my-controller

http://localhost:81/demo_sf/web/index.php/main/saveFuncionario?nome=Wagner



### 6. View



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