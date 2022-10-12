
Run composer intall
```bash
composer install
```

Run NPM install
```bash
npm install
```

Compile all assets
```bash
npm run dev
```

Run following command
```bash
vite build
```

## Further Setup
Make a copy of ```.env.example``` file and rename it to ```.env```, insert your database connection information found in ```.env``` file (starting with ```DB_```)


Generate key with given command
```bash
php artisan key:generate
```

## Database migration
Run command to create database tables and seed a few example categories
```bash
php artisan migrate --seed
````
