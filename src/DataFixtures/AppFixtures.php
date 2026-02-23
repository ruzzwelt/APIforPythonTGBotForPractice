<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;
use DateTime;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product = new Product();

        $product->setName("Product 1");
        $product->setSize(100);
        $product->setPublishedOn(new DateTime("2026-01-17"));

        $manager->persist($product);

        $product = new Product();

        $product->setName("Product 2");
        $product->setSize(200);
        $product->setPublishedOn(new DateTime("2026-01-05"));
        $product->setIsAvailable(false);

        $manager->persist($product);

        $manager->flush();
    }
}
