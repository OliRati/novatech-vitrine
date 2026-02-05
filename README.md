### How to run this Symfony Web Application

- Clone this repository

- go to repository directory

- Restore dependencies with

```bash
composer update
```

As a simple user you need to define a directory accessible to you for storing php sessions.

For example create ~/php_sessions directory using command :

```bash
mkdir ~/php_sessions
```

Then run the Symfony project with following command :

```bash
php -d session.save_path=~/php_sessions -S 127.0.0.1:8000 -t public public/index.php
```

or you can use Symfony Cli as follow if it works for you

```bash
symfony server:start
```
