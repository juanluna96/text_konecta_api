# BACKEND API

To create the DATABASE, use this configuration:

MYSQL
db_name: empleados_konecta
user: root
password: root

If you have differents configurations, you would change it in the codeIgniter config file.

If you dont have COMPOSER, download here:

```bash
https://getcomposer.org/download/
```

For install the proyects denpendencies use:

```bash
composer install
```

Run the migrations:

```bash
php spark migrate
```

First, run the development server:

```bash
php spark serve
```

Open [http://localhost:8080](http://localhost:8080) with your browser to see the result.

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
