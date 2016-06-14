# Acme Quick Start/Installation Guide

## Laravel's Homestead VM Installation

1. Follow instructions for installation of Laravel's Homestead to run the app</br> [Laravel Homestead](https://laravel.com/docs/5.2/homestead)
2. Clone the ACME repo from github onto your computer from your terminal</br>
    a. Type: ``` git clone https://github.com/mwitt8178/acme.git ```<br>
3. Type: ``` homestead edit ``` in your terminal to edit the homestead.yml file<br>
    a. Make sure the homestead configuration file is mapped/configured correctly to point to the newly cloned ACME repo on your computer.</br>
4. Type ``` homestead up ``` to launch homestead VM

## ACME Installation
1. While SSH'd into Laravel's Homestead VM run these commands from within the ACME root project directory.</br>
    a. Type: ``` sudo -i ```<br>
    b. Type: ``` composer install ```<br>
    c. Type: ``` npm install ```<br>
    d. Type: ``` bower install ```<br>
    e. Type: ``` gulp ```<br>

## Database Migrations

1. While SSH'd into Laravel's Homestead VM run these artisan commands from within the ACME root project directory.<br>
    a. Type: ``` php artisan migrate ```<br>
    b. Type: ``` php artisan db:seed ```<br>

## Hosts File Setup

1. Update /etc/hosts file with the ip address listed at the top of your homestead.yml file with a domain name for the ACME app <br>
    Example:<br>
    a. Open terminal<br>
    b. Type: </br>``` sudo vi /etc/hosts ```<br>
    c. add this code snippet to the bottom of the file<br> ``` 192.168.10.10 acme.app ```<br>
    d. Save and exit<br>
    e. You should now be able to access acme.app from your url in the browser<br>

## Authentication
    1. To login to the ACME application
        a. username: admin@acmesupportteam.com
        b. password: password

# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
