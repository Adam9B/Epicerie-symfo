<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProduitController extends AbstractController
{
    #[Route('/homepage', name: 'app_produit')]
    public function index(ProduitRepository $repository): Response
    {

        $produit = $repository->findAll();
        return $this->render('produit/index.html.twig', [
            'produits' => $produit,
        ]);
    }
    
    
    #[Route('/homepage/{alias}', name: 'produit_show')]
public function show(string $alias, ProduitRepository $repository): Response
{
    $product = $repository->findOneBy(['alias' => $alias]);
    return $this->render('produit/show.html.twig', [
        'produit' => $product,
    ]);
}

}

