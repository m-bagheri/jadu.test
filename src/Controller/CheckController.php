<?php

namespace App\Controller;

use App\Service\Checker;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckController extends AbstractController
{

  /**
   * @Route("/", name="check", methods={"GET","POST"})
   * @param Request $request
   * @param Checker $checker
   * @return Response
   */
    public function index(Request $request, Checker $checker): Response
    {
        $palindromeWord = $request->request->get('palindromeWord', '');
        $anagram = $request->request->get('anagram', ['word' => '', 'comparison' => '']);
        $pangramPhrase = $request->request->get('pangramPhrase', '');
        return $this->render('check/index.html.twig', [
            'palindromeWord' => $palindromeWord,
            'anagram' => $anagram,
            'pangramPhrase' => $pangramPhrase,
            'isPalindrome' => !empty($palindromeWord) ? $checker->isPalindrome($palindromeWord) : null,
            'isAnagram' => !empty($anagram['word']) && !empty($anagram['comparison']) ? $checker->isAnagram($anagram['word'], $anagram['comparison']) : null,
            'isPangram' => !empty($pangramPhrase) ? $checker->isPangram($pangramPhrase) : null,
        ]);
    }
}
