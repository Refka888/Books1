<?php
// src\DataFixtures\AppFixtures.php

namespace App\DataFixtures;

use App\Entity\Book;
use App\Entity\Author;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
  
    
    // Création des auteurs.
    $listAuthor = [];
    for ($i = 0; $i < 10; $i++) {
        // Création de l'auteur lui-même.
        $author = new Author();
        $author->setFirstName("Prénom " . $i);
        $author->setLastName("Nom " . $i);
        $manager->persist($author);
        // On sauvegarde l'auteur créé dans un tableau.
        $listAuthor[] = $author;
    }
        // Création d'une vingtaine de livres ayant pour titre
        for ($i = 0; $i < 20; $i++) {
            $book = new Book;
            $book->setTitle('Livre ' . $i);
            $book->setCoverText('Quatrième de couverture numéro : ' . $i);
            $book->setAuthor($listAuthor[array_rand($listAuthor)]);
            $manager->persist($book);
            
        }

        $manager->flush();
    }
}
