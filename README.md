# elastos-did-auth-sample
A sample application showing off webapp authentication with the Elastos DID blockchain and Elaphant Wallet

## Installation
1. `git clone https://github.com/compy/elastos-did-auth-sample`
2. `cp .env.dist .env`
3. `php artisan key:generate` to generate an encryption key for your application
4. Edit .env and supply your DID information and database credentials
5. `php artisan migrate` to set up the initial database schema
6. `composer install` to install composer dependencies
7. `npm install` to install NPM dependencies for frontend building
8. `npm run dev` to generate assets
If you're using Laravel Valet, then your application is available at http://elastos-did-auth-sample.test or whatever directory name you cloned the repo to.

## License
This application is licensed under the terms of the MIT license
