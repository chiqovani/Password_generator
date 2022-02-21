<?php
use PasswordGenerator\Rules\RuleOne;
use PasswordGenerator\Rules\RuleTwo;
use PasswordGenerator\Rules\RuleThree;
use PasswordGenerator\PasswordGenerator;


class PasswordGenerationTest extends  \PHPUnit\Framework\TestCase
{
    /**
     * @throws Exception
     */
    public function testRuleOne() {
        $rule = new RuleOne();
        $password = $rule->generate(rand(6,20));
        $values = $this->getCharacterTypesCount($password);
        $this->assertGreaterThanOrEqual(2,$values['upperCase']);
        $this->assertGreaterThanOrEqual(1,$values['lowerCase']);
    }

    /**
     * @throws Exception
     */
    public function testRuleTwo() {
        $rule = new RuleTwo();
        $password = $rule->generate(rand(6,20));
        $values = $this->getCharacterTypesCount($password);
        $this->assertGreaterThanOrEqual(2,$values['upperCase']);
        $this->assertGreaterThanOrEqual(1,$values['lowerCase']);
        $this->assertGreaterThanOrEqual(1,$values['numbers']);
    }
    /**
     * @throws Exception
     */
    public function testRuleThree() {
        $rule = new RuleThree();
        $password = $rule->generate(rand(6,20));
        $values = $this->getCharacterTypesCount($password);
        $this->assertGreaterThanOrEqual(1,$values['symbols']);
    }

    /**
     * @throws Exception
     */
    public function testPasswordMinimumLength() {
        $this->expectException(Exception::class);
        new PasswordGenerator(new RuleOne(), rand(0,5));
    }

    /**
     * @throws \Exception
     */
    public function testPasswordLength() {
        $length = rand(6,20);
        $password = new PasswordGenerator(new RuleTwo(), $length);
        $this->assertEquals($length, strlen($password->generate()));
    }

    protected function getCharacterTypesCount($string): array
    {
        $symbolAscii = [58,33,35,36,37,38,40,41,123,125,91,93];
        $symbolCounter = 0;
        $uppercaseCounter = 0;
        $lowercaseCounter = 0;
        $numberCount = 0;
        $chars = str_split($string);
        foreach($chars as $char)
        {
            if(ord($char) >= 65 && ord($char) <= 90) {
                $uppercaseCounter+=1;
            }elseif (ord($char) >= 97 && ord($char) <= 122) {
                $lowercaseCounter+=1;
            }elseif (ord($char) >= 48 && ord($char) <= 57) {
                $numberCount+=1;
            }elseif (in_array(ord($char), $symbolAscii)) {
                $symbolCounter+=1;
            }
        }
        return ['numbers' =>$numberCount, 'lowerCase' => $lowercaseCounter, 'upperCase' => $uppercaseCounter, 'symbols' => $symbolCounter];
    }
}