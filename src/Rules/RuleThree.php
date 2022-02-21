<?php


namespace PasswordGenerator\Rules;


class RuleThree implements RulesInterface
{

    public function generate(int $length): string
    {
        // Generate at least on symbol form here !#$%&(){}[]=
        $characters = '!#$%&(){}[]=';
        $string = '';
        $count = rand(1,$length);
        for ($i = 0; $i < $count; $i++) {
            $string .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $string;
    }
}