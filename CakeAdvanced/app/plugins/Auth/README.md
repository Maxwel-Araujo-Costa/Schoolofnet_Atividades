# Auth plugin for CakePHP

## Installation

You can install this plugin into your CakePHP application using [composer](https://getcomposer.org).

The recommended way to install composer packages is:

```
composer require beholderhive/auth-cake-max
```

Update your 'config/bootstrap.php'.

```
Plugin::load('Auth',  ['bootstrap' => false, 'routes' => true]);
```

Migrations

```
bin/cake migrations migrate --plugin Auth
```
