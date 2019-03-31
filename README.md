### Installation
- Run composer install
- Run docker-compose up
- Run docker-compose exec mariadb mysql -p perkele
- CREATE DATABASE map_api;
- Run php bin/console doctrine:schema:create
- Run php bin/console server:run


### Sample Request

```
curl -X POST \
  http://127.0.0.1:8000/filter/list \
  -H 'Content-Type: application/json' \
  -H 'Cookie: XDEBUG_SESSION=PHPSTORM' \
  -H 'Postman-Token: e1e05c2f-34ac-46c8-a1d1-a4204f3b5368' \
  -H 'cache-control: no-cache' \
  -d '{
    "regions": [
        "mazovia",
        "kujawskie"
    ]
}'
```
