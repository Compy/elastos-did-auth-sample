# elastos-did-auth-sample
A sample application showing off webapp authentication with the Elastos DID blockchain and Elaphant Wallet

## Installation
1. `git clone https://github.com/compy/elastos-did-auth-sample`
2. `cp .env.dist .env`
3. Edit .env and supply your DID information and database credentials
4. If you're on Ubuntu, you might have to install these tools first: 
    `sudo apt install php7.2 php7.2-cli php7.2-common php7.2-json php7.2-opcache php7.2-mysql php7.2-mbstring php7.2-zip php7.2-fpm php7.2-xml composer -y`
5. If you're on Mac, you might have to install these tools first: 
    `brew update && brew install php`
    Then, install composer:
    ```curl -sS https://getcomposer.org/installer | php```
    Once installing composer, you need to set an alias to composer.phar by doing something like the following on your ~/.bash_profile
    ```alias composer="php ~/composer.phar"```
6. `composer install` to install composer dependencies
7. `php artisan key:generate` to generate an encryption key for your application
8. `php artisan migrate` to set up the initial database schema
9. `npm install` to install NPM dependencies for frontend building
10. `npm run dev` to generate assets
101. `php artisan serve --host 0.0.0.0`

Note: If you're using Laravel Valet or Homestead, then your application is available at http://elastos-did-auth-sample.test or whatever directory name you cloned the repo to.

## License
This application is licensed under the terms of the MIT license
