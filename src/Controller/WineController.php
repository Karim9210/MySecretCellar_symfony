<?php

namespace App\Controller;

use App\Form\WineType;
use App\Entity\User;
use App\Entity\Wine;
use App\Repository\WineRepository;
use App\Repository\CountryRepository;
use App\Repository\RegionRepository;
use App\Repository\AppellationRepository;
use App\Repository\ColorRepository;
use App\Repository\TypeRepository;
use App\Form\SearchWineFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/wine')]

class WineController extends AbstractController
{
    #[Route('/', name: 'app_wine_index')]
    public function index(
        Request $request,
        WineRepository $wineRepository,
        CountryRepository $countryRepository,
        RegionRepository $regionRepository,
        AppellationRepository $appellationRepo,
        ColorRepository $colorRepository,
        TypeRepository $typeRepository
    ): Response {

        /** @var User */
        $user = $this->getUser();

        $form = $this->createForm(SearchWineFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $search = $form->get('search')->getData();

            $wines = $wineRepository->findLikeDomaine($search, $user);
        } elseif (!empty($_POST)) {
            $wines = $wineRepository->filterWines($_POST, $user);
        } else {
            $wines = $wineRepository->findCellar($user);
        }
        return $this->renderForm('wine/index.html.twig', [
            'user' => $user,
            'form' => $form,
            'wines' => $wines,
            'countries' => $countryRepository->findAll(),
            'regions' => $regionRepository->findAll(),
            'appellations' => $appellationRepo->findAll(),
            'colors' => $colorRepository->findAll(),
            'types' => $typeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_wine_new', methods: ['GET', 'POST'])]
    public function new(Request $request, WineRepository $wineRepository): Response
    {
        $wine = new Wine();
        $form = $this->createForm(WineType::class, $wine);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User */
            $user = $this->getUser();
            $wine->addUser($user);
            $wineRepository->save($wine, true);

            return $this->redirectToRoute('app_wine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('wine/new.html.twig', [
            'wine' => $wine,
            'form' => $form,
        ]);
    }

    #[Route('/show/{id}', name: 'app_wine_show', methods: ['GET'])]
    public function show(Wine $wine): Response
    {
        //  $winePurchaseDate = $wine->getPurchaseDate()->format('d/m/Y');
        // dd($winePurchaseDate);
        return $this->render('wine/show.html.twig', [
            'wine' => $wine,
            // 'winePurchaseDate' => $winePurchaseDate
        ]);
    }

    #[Route('/{id}/edit', name: 'app_wine_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Wine $wine, WineRepository $wineRepository): Response
    {
        $form = $this->createForm(WineType::class, $wine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $wineRepository->save($wine, true);

            return $this->redirectToRoute('app_wine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('wine/edit.html.twig', [
            'wine' => $wine,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_wine_delete', methods: ['POST'])]
    public function delete(Request $request, Wine $wine, WineRepository $wineRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $wine->getId(), $request->request->get('_token'))) {
            $wineRepository->remove($wine, true);
        }

        return $this->redirectToRoute('app_wine_index', [], Response::HTTP_SEE_OTHER);
    }
}
