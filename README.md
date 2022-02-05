<h4>Install composer</h4>

```
cd laravel-project-main
composer install --ignore-platform-reqs
OR
composer update --ignore-platform-reqs
```

<br>
<h4>Preparing your environment</h4>

```
Copy .env.example and rename it to .env
php artisan key:generate
npm install && npm run dev
```

<br>
<h3>Preparing the database</h3>
<p>Change db name and user credentials in .env file</p>
<p>Migrate and seed the database</p>

```
php artisan migrate –-seed
```
