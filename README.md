<img src="https://user-images.githubusercontent.com/70708109/103316306-c17ccf80-4a30-11eb-92b3-5f0fd06d9957.png" width="400">

# Recipe Club
This repository holds the code and script for simple recipe sharing website made with Symfony 5.

## Technologies used to create this project
* Symfony Controllers
* Twig templates
* Doctrine ORM
* Login form Authentication
* Route authentication via access_control
* Fixtures
* Form builder
* Form validator
* Custom form themes

## Project features
- [x] Login via username Authentication system
- [x] Remember me option on login form
- [x] Registration
- [ ] Crud on Recipe entity
- [ ] Crud on Ingredients entity
- [ ] Admin dashboard
- [ ] Homepage with latest approved recipes
- [ ] Profile dashboard
- [ ] File upload



## Setup

Considering you already downloaded the code you must follow these steps:


**Download Composer dependencies**

Make sure you have [Composer installed](https://getcomposer.org/download/)
and then run:

```
composer install
```

You may alternatively need to run `php composer.phar install`, depending
on how you installed Composer.

**Configure the .env (or .env.local) File**

Open the `.env` file and make any adjustments you need - specifically
`DATABASE_URL`. Or, if you want, you can create a `.env.local` file
and *override* any configuration you need there (instead of changing
`.env` directly).

**Setup the Database**

Again, make sure `.env` is setup for your computer. Then, create
the database & tables!

```
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

If you get an error that the database exists, that should
be ok. But if you have problems, completely drop the
database (`doctrine:database:drop --force`) and try again.

**Compiling Webpack Encore Assets**

This project uses Webpack Encore.

Make sure to install [Node](https://nodejs.org/en/download/) and also [yarn](https://yarnpkg.com).
Then run:

```
yarn install
yarn encore dev --watch
```

**Start the built-in web server**

You can use Nginx or Apache, but Symfony's local web server
works even better.

To install the Symfony local web server, follow
"Downloading the Symfony client" instructions found
here: https://symfony.com/download - you only need to do this
once on your system.

Then, to start the web server, open a terminal, move into the
project, and run:

```
symfony serve (-d)
```


(If this is your first time using this command, you may see an
error that you need to run `symfony server:ca:install` first).

Now check out the site at `https://localhost:8000`

Have fun!

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.
