<?php

namespace App\Controller;

use App\Repository\WineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(WineRepository $wineRepository): Response
    {

        // $sumValue = $wineRepository->sumValue();
        return $this->render('home/index.html.twig');
    }
}
