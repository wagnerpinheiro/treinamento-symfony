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


## Remove all containers
docker stop $(docker ps -a -q)
docker rm $(docker ps -a -q)

## Remove all images
docker rmi $(docker images -q)