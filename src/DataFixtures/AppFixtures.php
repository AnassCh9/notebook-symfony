<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Note;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
            

            for($i=0;$i<50;$i++){
                $notes = new Note();
                $notes->setTitle("'My '$i' title'")
                ->setContent("'This is my '$i' note'")
                ->setCreatedAt(new \DateTimeImmutable('now'))
                ->setUpdatedAt(new \DateTimeImmutable('now'))
                ->setAuthor("'Jens '$i");
                $manager->persist($notes);
            }


            $categories = ['PHP', 'Symfony', 'Doctrine', 'Twig', 'MySQL', 'JavaScript', 'React', 'Vue', 'Angular', 'NodeJS'];

            $colors = ['red', 'blue', 'green', 'yellow', 'orange', 'purple', 'pink', 'brown', 'black', 'white', 'grey', 'cyan', 'magenta', 'lime', 'olive', 'teal', 'navy', 'maroon', 'aqua', 'fuchsia'];

            // for($i=0;$i<20;$i++){
            //     $categories = new Category();
            //     $categories->setTitle("'My '$i' title'")
            //     ->setColor("'This is my '$i' note'")
            //     $manager->persist($categories);
            // }

            // foreach($categories as $category){
            //     $category = new Category();
            //     $category->setTitle($category)
            //     ->setColor($colors[array_rand($colors)]);
            //     $manager->persist($category);
            // }

            for($i=0;$i < count($categories);$i++){
                $category = new Category();
                $category->setTitle($categories[$i])
                ->setColor($colors[array_rand($colors)]);
                $manager->persist($category);
            }
            


        $manager->flush();
    }
}
