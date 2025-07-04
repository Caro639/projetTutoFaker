<?php

namespace App\DataFixtures;

use App\Factory\AuthorFactory;
use App\Factory\ComicFactory;
use App\Factory\GenreFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        //creer 500 auteurs
        AuthorFactory::createMany(number: 500);

        //creer 4 genres
        GenreFactory::createOne(['label' => 'Action']);
        GenreFactory::createOne(['label' => 'Comédie']);
        GenreFactory::createOne(['label' => 'Romance']);
        GenreFactory::createOne(['label' => 'SF']);

        ComicFactory::createMany(number: 200);

        $manager->flush();
    }
}
