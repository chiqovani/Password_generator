# Password Generator

PHP package for generating passwords with different strength

Strength 1 (ruleOne)
- At least two capital letters
- At least one lowercase letter

Strength 2 (ruleTwo)
- At least two capital letters
- At least one lowercase letter
- At least one number between 2 and 5 - including 2 and 5.

Strength 3 (ruleThree)
- At least one symbol from the symbol set: !#$%&(){}[]=

## Installation

```bash
composer require zeppelin/pass-generator
```


## Usage
pass Rule and password length to PasswordGenerator
```php 
use PasswordGenerator\PasswordGenerator;
use PasswordGenerator\Rules\RuleTwo;

$password = new PasswordGenerator(new RuleTwo(), 10)

# returns random password
$password->generate()

```

## License
[MIT](https://choosealicense.com/licenses/mit/)