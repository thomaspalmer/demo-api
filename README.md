## Install
1. This application requires PHP@8.1 and a MySQL server
2. Clone down the repository to your machine.
3. Install vendor packages: `composer install`
4. Copy the .env.example to .env `cp .env.example .env` and open and set database credentials that work for your environment
5. Generate a key: `php artisan key:generate`
6. Install passport (`php artisan passport:keys`) and create a client: `php artisan passport:client --password --no-interaction`, remember the details as they will be required in the frontend app
7. Run migrations and seed: `php artisan migrate:fresh --seed`, all users are seeder with the password 'password'
8. Start the server `php artisan serve`
