<?php


namespace PasswordGenerator\Rules;


class RuleTwo implements RulesInterface
{

    public function generate(int $length): string
    {
        $ruleOne = new RuleOne();
        $string = $ruleOne->generate($length - 1);
        $numberCount = rand(1,$length-strlen($string));
        for ($i = 0; $i < $numberCount; $i++) {
            $string .= rand(2,5);
        }
        return $string;
    }

}