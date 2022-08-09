## Install
1. Clone down the repository to your machine.
2. Install vendor packages: `composer install`
3. Copy the .env.example to .env `cp .env.example .env` and open and set database credentials that work for your environment
4. Install passport and create a client: `php artisan passport:client --password --no-interaction`, remember the details as they will be required in the frontend app
5. Run migrations and seed: `php artisan migrate:fresh --seed`, all users are seeder with the password 'password'
