
Create tables:

php artisan migrate

Fill `users` table :
php artisan db:seed --class UsersTableSeeder

Fill `posts` table
php artisan db:seed --class=PostsTableSeeder