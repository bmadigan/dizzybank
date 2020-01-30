<p align="center"><img src="https://github.com/bmadigan/dizzybank/blob/master/public/svgs/logo-color.svg" width="400"></p>

## What Is Dizzybank?

Dizzybank is a simple [Laravel](https://laravel.com) application that is currently being developed to act as a banking / fintech SaaS app.  The idea of the app is to learn the [Spaties Event Sourcing package](https://docs.spatie.be/laravel-event-sourcing/) and to eventually act as an API for an upcoming [Flutter Mobile](https://flutter.dev/) application that I am building to learn the Flutter/Dart language.

> **Please Note:** This application is still being developed

## What Dizzybank Is Not?

Dizzybank is not meant to act as a production ready fintech application, rather the idea is to be used to power the API for a simple upcoming Mobile App.

## Installation

Clone the repository:

```
git clone https://github.com/bmadigan/dizzybank.git dizzybank
cd dizzybank
```

Install Composer Packages

`composer install`

Install NPM dependencies:

`npm ci`

Build assets:

`npm run dev`

Setup configuration:

`cp .env.example .env`

Generate application key:

`php artisan key:generate`

Create an SQLite database. You can also use another database (MySQL, Postgres), simply update your configuration accordingly.

`touch database/database.sqlite`

Run database migrations:

`php artisan migrate`

Run database seeder:

`php artisan db:seed`

Run the dev server (the output will give the address):

`php artisan serve`

You're ready to go! Visit Dizzybank in your browser, and login with:

    Username: slater@email.com
    Password: secret

## License

The Dizzybank application is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
