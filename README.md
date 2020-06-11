# crm
CRM  

You can see screenshots in `docs/` folder to

## How to install

1. Download the project

```
  ~$ git clone https://https://github.com/pcabreus/crm.git
  ~$ cd crm
```

2. Run docker

```
  ~/crm$ docker-compose up -d 
```

3. Instal dependencies in the container

```
  ~/crm$ docker exec -it positibe_crm_php symfony composer install 
```

4. Run the fixtures

```
  ~/crm$ docker exec -it positibe_crm_php symfony console doctrine:fixtures:load 
```

5. Go to `https://positibe_crm.localhost`. That's all.
