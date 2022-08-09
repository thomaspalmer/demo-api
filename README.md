## Install
1. This application requires PHP@8.1 and a MySQL server
2. Clone down the repository to your machine: `git clone git@github.com:thomaspalmer/demo-api`
3. Access the folder: `cd demo-api`
4. Install vendor packages: `composer install`
5. Copy the .env.example to .env `cp .env.example .env` and open and set database credentials that work for your environment
6. Run the install command which will run migrations, seed data etc... `php artisan install`
7. Start the server `php artisan serve`

# Test
Running tests can be achieved via: `php artisan test`
