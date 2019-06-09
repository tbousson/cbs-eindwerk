# cbs-eindwerk



```bash
git clone https://github.com/shinragriever/cbs-eindwerk
```



Maak een nieuwe database aan via phpmyadmin  en copy .env.example naar .env

voor Windows:

```
copy .env.example .env
```

Voor Linux/Unix

```bash
cp .env.example .env
```

Wijzig volgende velden in .env: 

```
DB_DATABASE=*database_naam*
DB_USERNAME=*database_gebruikersnaam*
DB_PASSWORD=*database_wachtwoord
```

Maak een nieuwe key aan voor de Laravel applicatie.

```bash
php artisan key:generate
```





