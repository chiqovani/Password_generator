<?php


namespace PasswordGenerator\Rules;


class RuleOne implements RulesInterface
{

    public function generate(int $length): string
    {
        // Generate at least 2 Uppercase and at least 1 lowercase letter
        $uppercaseCount = rand(2,$length-1);
        $lowercaseCount = rand(1,$length-$uppercaseCount);
        $randomString = $this->generateString($uppercaseCount);
        $randomString .= strtolower($this->generateString($lowercaseCount));
        return $randomString;
    }
    public static function generateString($length) {
        $characters = 'ABCDEFGHILKMNOPQRSTUVWXYZ';
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[rand(0, strlen($characters) - 1 )];
        }
        return $string;
    }
}