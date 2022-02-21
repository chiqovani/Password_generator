<?php

namespace PasswordGenerator;
use PasswordGenerator\Rules\RulesInterface;

interface PasswordGeneratorInterface
{
    public function __construct(RulesInterface $rule,int $length);

    public function generate(): string;
}