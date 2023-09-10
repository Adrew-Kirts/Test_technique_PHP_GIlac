# GILAC Test Technique PHP 

## Test objective

> The program reads a series of CSV files, where each file represents the topography of an island. It calculates and outputs the hidden surface area of each island. The hidden surface area is the portion of the island that cannot be seen from the west (the only entre point to the island is from the west). The program handles variations in island heights and calculates the hidden area accordingly.

## Steps undertaken to initialize and complete PHP test 

### Installing composer

(On OSX in my case):

``` 
MacBook-Pro-Ez:~ ezra$ brew install composer
```

In project directory containing composer.json:

```
composer install
```

### Running program (and other options)

```
make run: 
```

This target is used to execute your PHP application by running the index.php file.

- make lint: This target runs PHP_CodeSniffer (phpcs) to check your PHP code for coding standards violations.

- make lint-fix: This target runs PHP_CodeSniffer (phpcbf) to automatically fix coding standards violations in your PHP code.

- make tests: This target runs PHPUnit tests located in the tests/ directory
