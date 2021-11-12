<?php

namespace App\Tests\Service;

use App\Service\Checker;
use PHPUnit\Framework\TestCase;

class CheckerTest extends TestCase
{

  public function testIsPangram()
  {
    $checker = new Checker();
    $passedTests = count(array_filter([
      true == $checker->isPangram('The quick brown fox jumps over the lazy dog'),
      true == $checker->isPangram('The quick brown fox jumps over the lazy dog.'),
      true == $checker->isPangram('Forsaking monastic tradition, twelve jovial friars gave up their vocation for a questionable existence on the flying trapeze'),
      true == $checker->isPangram('Crazy Fredericka bought many very exquisite opal jewels'),
      true == $checker->isPangram('The quick brown fox jumps over a lazy dog'),

      false == $checker->isPangram('The British Broadcasting Corporation (BBC) is a British public service broadcaster.'),
      false == $checker->isPangram('The quick red fox jumps over a lazy dog.'),
      false == $checker->isPangram('The quick red fox jumps over a lazy dog'),
      false == $checker->isPangram('Honest Fredericka bought many very exquisite opal jewels'),
    ]));

    $this->assertEquals(9, $passedTests);
  }

  public function testIsPalindrome()
  {
    $checker = new Checker();
    $tests = [
      true == $checker->isPalindrome('anna'),
      true == $checker->isPalindrome('Gig'),
      true == $checker->isPalindrome('A'),
      true == $checker->isPalindrome('BB'),
      true == $checker->isPalindrome('LOL'),
      true == $checker->isPalindrome('noon'),
      true == $checker->isPalindrome('radar'),
      true == $checker->isPalindrome('racecar'),
      true == $checker->isPalindrome('taco cat'),
      true == $checker->isPalindrome('race car'),

      false == $checker->isPalindrome('Bark'),
      false == $checker->isPalindrome('Dart'),
      false == $checker->isPalindrome('Test'),
      false == $checker->isPalindrome('Mate'),
      false == $checker->isPalindrome('AB'),
      false == $checker->isPalindrome('ABC'),
      false == $checker->isPalindrome('doge'),
      false == $checker->isPalindrome('monkey'),
    ];

    $passedTests = count(array_filter($tests));

    $this->assertEquals(18, $passedTests);
  }

  public function testIsAnagram()
  {
    $checker = new Checker();
    $tests = [
      true == $checker->isAnagram('coalface', 'cacao elf'),
      true == $checker->isAnagram('plates', 'pastel'),
      true == $checker->isAnagram('plates', 'staple'),
      true == $checker->isAnagram('eat', 'ate'),
      true == $checker->isAnagram('eat', 'tea'),
      true == $checker->isAnagram('scramble', 'clambers'),

      false == $checker->isAnagram('coalface', 'dark elf'),
      false == $checker->isAnagram('scramble', 'rambles'),
    ];

    $passedTests = count(array_filter($tests));

    $this->assertEquals(8, $passedTests);
  }
}
