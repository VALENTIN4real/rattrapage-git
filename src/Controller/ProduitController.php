<?php

namespace App\Controller;

use App\Entity\Produit;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    #[Route('/produits', name: 'app_produits')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Produit::class);
        $produits = $repository->findAll();
        return $this->render('produit/index.html.twig', [
            'produits' => $produits,
        ]);
    }

    #[Route('/produit/{id}', name: 'app_produit')]
    public function getProduitById(ManagerRegistry $doctrine, $id): Response
    {
        $repository = $doctrine->getRepository(Produit::class);
        $produit = $repository->find($id);
        return $this->render('produit/product.html.twig', [
            'produit' => $produit,
        ]);
    }
}
