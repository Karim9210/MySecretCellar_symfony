<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\WineRepository;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]

    #[IsGranted('ROLE_USER')]
    public function index(WineRepository $wineRepository, UserRepository $userRepository): Response
    {


         /** @var User */
        $user = $this->getUser();
        $userRepository->find($user);
        $sumValue = $wineRepository->sumValue($user);
        $bottleNumber = $wineRepository->bottleNumber($user);



        return $this->render('home/index.html.twig', [
            'sumValue' => $sumValue,
            'nbBottles' => $bottleNumber,
        ]);
    }
}
