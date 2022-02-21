<?php

namespace PasswordGenerator\Rules;
interface RulesInterface
{
    public function generate(int $length): string;
}