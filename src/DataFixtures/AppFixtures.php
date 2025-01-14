<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $produits = [
            ['stylo', 880, 0.3, "stylo.jpg", false,"stylo"],
            ['Extincteur', 120, 10, "extincteur.jpg", false,"extincteur"],
            ['Couteau de cuisine', 25, 0.5, "couteaudecuisine.jpg", true,"couteaudecuisine"],
            ['Trousse de secours', 15, 1, "troussedesecour.jpg", false,"troussedesecour"],
            ['Sac à dos', 50, 2, "sacados.jpg", false,"sacados"],
            ['PCGamer', 800, 15, "pcgamer.jpg", false,"PCGamer"],
            ['Jerrican d\'essence', 60, 20, "jerricanessence.jpg", true,"jerricanessence"],
            ['Boîte de conserve', 5, 0.4, "boitedeconserve.jpg", false,"boitedeconserve"],
            ['Voiture pour enfant', 45000, 1800, "voitureenfant.jpg", false,"voitureenfant"],
            ['Téléphone Surpuissant', 522, 2, "qilive.jpg", true, "qilive"]
        ];
        foreach ($produits as [$nom, $prix, $poids, $image, $dangereux, $alias]) {
                $produit = new Produit();
                $produit->setNom($nom);
                $produit->setPrix($prix);
                $produit->setPoids($poids);
                $produit->setImage("/image/produit/" . $image);
                $produit->setDangereux($dangereux);
                $produit->setAlias($alias);
                $manager->persist($produit);
            }
        $manager->flush();
    }
}
