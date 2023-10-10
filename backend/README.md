# Installation instructions of CodeIgniter 4

1. Clone the repository to your computer
```
git clone https://github.com/No-Country/nc_c14-40-m-php-vue/tree/main
```

2. On your terminal, navigate to the folder location
```
cd nc_c14-40-m-php-vue
```

3. Run composer install. (If you don't have composer on your computer, install it: https://getcomposer.org/download/)
```
composer install
```

4. Delete the file extension from the file .env.example to .env and configure your environment database accordingly

5. Migrate the database by typing on the terminal:
```
php spark migrate
```

6. If you want, you can insert exemple user & restaurant data (UserSeeder & RestaurantSeeder) in your database
```
php spark db:seed UserSeeder
```
```
php spark db:seed RestaurantSeeder
```

