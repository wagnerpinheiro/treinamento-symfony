# Install Dependencies

## Ubuntu 16.04

### Docker do respositorio ubuntu
```
sudo apt-get install docker
sudo apt-get install python-pip
pip install --upgrade pip
pip install docker-compose
```

### Docker 1.12 from official repository:
```
sudo apt-get update
sudo apt-get install linux-image-extra-$(uname -r) linux-image-extra-virtual
sudo apt-get install apt-transport-https ca-certificates
sudo apt-key adv --keyserver hkp://p80.pool.sks-keyservers.net:80 --recv-keys 58118E89F3A912897C070ADBF76221572C52609D
echo "deb https://apt.dockerproject.org/repo ubuntu-xenial main" | sudo tee /etc/apt/sources.list.d/docker.list
sudo apt-get update
apt-cache policy docker-engine
sudo apt-get install docker-engine
sudo groupadd docker
sudo usermod -aG docker $USER
docker --version # 1.12.x
docker run hello-world
```


### docker-compose:
```
curl -L https://github.com/docker/compose/releases/download/1.8.1/run.sh > /usr/local/bin/docker-compose
chmod +x /usr/local/bin/docker-compose
```

### MySQL Cli:

```
sudo apt install mysql-client-core-5.7
```

### Build do php-fpm customizado
```
docker build docker/php-fpm/ -t php:5.6-fpm-pdo
```

## Centos 6/7

### dependencias

```
sudo yum update
yum install git mysql php php-pdo php-pdo-mysql
```

### Docker

```
curl -fsSL https://get.docker.com/ | sh
sudo systemctl enable docker.service
sudo systemctl start docker
sudo docker run --rm hello-world

sudo groupadd docker
sudo usermod -aG docker your_username`
docker run --rm hello-world
sudo systemctl enable docker
```

### Docker-compose

```
curl -L "https://github.com/docker/compose/releases/download/1.8.1/docker-compose-$(uname -s)-$(uname -m)" > /usr/local/bin/docker-compose
chmod +x /usr/local/bin/docker-compose
docker-compose --version
```

## Symfony

### Composer

```
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
```