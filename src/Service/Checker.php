<?php


namespace App\Service;

/**
 * Pangrams, anagrams and palindromes
 *
 * Implement each of the functions of the Checker class.
 * Aim to spend about 10 minutes on each function.
 */
class Checker
{
  /**
   * A palindrome is a word, phrase, number, or other sequence of characters
   * which reads the same backward or forward.
   *
   * @param string $word
   * @return bool
   */
  public function isPalindrome(string $word): bool {
    if (strrev(strtolower(str_replace(' ', '', $word))) == strtolower(str_replace(' ', '', $word))){
      return true;
    }
    return false;
  }

  /**
   * An anagram is the result of rearranging the letters of a word or phrase
   * to produce a new word or phrase, using all the original letters
   * exactly once.
   *
   * @param string $word
   * @param string $comparison
   * @return bool
   */
  public function isAnagram(string $word, string $comparison): bool {
    $word = str_replace(' ', '', $word);
    $comparison = str_replace(' ', '', $comparison);

    if (strlen($word) != strlen($comparison)) {
      return false;
    }

    $wordArray = count_chars(strtolower($word));
    $comparisonArray = count_chars(strtolower($comparison));

    if (empty(array_diff_assoc($wordArray, $comparisonArray))) {
      return true;
    }

    return false;
  }

  /**
   * A Pangram for a given alphabet is a sentence using every letter of the
   * alphabet at least once.
   *
   * @param string $phrase
   * @return bool
   */
  public function isPangram(string $phrase): bool {
    $alphabets = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

    $split = str_split($phrase);

    foreach ($split as $char) {
      if (ctype_alpha($char)) {

        $char = strtolower($char);
        $key = array_search($char, $alphabets);
        if ($key !== false) {
          unset($alphabets[$key]);
        }
      }
    }

    if (empty($alphabets)) {
      return true;
    }

    return false;
  }
}