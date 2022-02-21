<?php

namespace PasswordGenerator;

use PasswordGenerator\Rules\RulesInterface;

class PasswordGenerator implements PasswordGeneratorInterface
{
    protected RulesInterface $rule;
    protected int $length;

    /**
     * @throws \Exception
     */
    public function __construct(RulesInterface $rule, int $length)
    {
        if($length < 6) throw new \Exception('Password length can not be less than 6');
        if($length > PHP_INT_MAX) throw new \Exception('Password length can not be greater than maximum integer');
        $this->rule = $rule;
        $this->length = $length;
    }

    public function generate(): string
    {
        $rulesString = $this->rule->generate($this->length);
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $randomPassword = '';
        for ($i = 0; $i < $this->length; $i++) {
            $randomPassword .= $characters[rand(0, strlen($characters) - 1)];
        }
        $randomPassword = substr($randomPassword, strlen($rulesString));
        return str_shuffle($randomPassword . $rulesString);
    }
}