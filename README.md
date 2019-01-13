## Run

To run this parser, you need to clone it and install dependencies:

```
git clone https://github.com/Franua/uri-parser.git
cd uri-parser/
composer install
```
You can run unit tests:
```
./vendor/bin/phpunit
```
You can run the CLI application:

```
./console
```
or
```
php console.php
```

The following commands are available:
```
./console uri-parse "URI string"`: displays the given URI parsed parts
```
You can then run the web application using PHP's built-in server:

```
php -S 0.0.0.0:8000 -t web/
```

The web application is running at [http://localhost:8000](http://localhost:8000/).

## Architecture

The container is created in [app/bootstrap.php](app/bootstrap.php). The configuration file for the container is [app/config.php](app/config.php).

Both the web application and the CLI application require `app/bootstrap.php` to get the container:

- the web application ([web/index.php](web/index.php)) uses [FastRoute](https://github.com/nikic/FastRoute) for routing, and then creates and invokes the controller using PHP-DI
- the CLI application ([console](console)) uses [Silly](https://github.com/mnapoli/silly): Silly uses the container to create and invoke the commands

You will note that in both case, the controllers/commands are instantiated and invoked by PHP-DI: this is to benefit from dependency injection in those classes.

## Additional info
Regular expression for URI validation and URI fixtures are taken from https://mathiasbynens.be/demo/url-regex (regex by @diegoperini).

Methods that are responsible for URI parsing, use [parse_url](http://php.net/manual/en/function.parse-url.php) and [parse_str](http://php.net/manual/en/function.parse-str.php) PHP functions. They are not 'perfect', but quite decent for the first approach. Also, implemented validation before parsing allows to handle cases that might be considered by these functions as 'valid'.
