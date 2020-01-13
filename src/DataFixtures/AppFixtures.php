<?php

namespace App\DataFixtures;


use App\Entity\Bureau;
use App\Entity\Modele;
use App\Entity\Categorie;
use App\Entity\Marque;
use App\Entity\MarqueProd;
use App\Entity\ModeleProd;
use App\Entity\Papeterie;
use App\Entity\ProdEntret;
use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
            $categorie1 = new Categorie();
            $categorie1->setLibelle("Mobilus");
            $manager->persist($categorie1);
            $categorie2 = new Categorie();
            $categorie2->setLibelle("Equipos");
            $manager->persist($categorie2);


                $module1 = new Modele();
                $module1->setPoids("12")
                        ->setLibelle("Carton")
                        ->setCouleur("gray")
                        ->setCategorie($categorie1);
                $manager->persist($module1);

                $module2 = new Modele();
                $module2->setPoids("12")
                        ->setLibelle("Carton")
                        ->setCouleur("gray")
                        ->setCategorie($categorie1);
                $manager->persist($module2); 

                $module3 = new Modele();
                $module3->setPoids("12")
                        ->setLibelle("Carton")
                        ->setCouleur("gray")
                        ->setCategorie($categorie2);
                $manager->persist($module3); 

                $module4 = new Modele();
                $module4->setPoids("12")
                        ->setLibelle("Carton")
                        ->setCouleur("gray")
                        ->setCategorie($categorie1);
                $manager->persist($module4); 

                $module5 = new Modele();
                $module5->setPoids("12")
                        ->setLibelle("Carton")
                        ->setCouleur("gray")
                        ->setCategorie($categorie2);
                $manager->persist($module5);        
                


    
            $bureau1 = new Bureau();
            $bureau1->setImage("modele1.jpg")
                    ->setPrix("1500")
                    ->setDescription("simple")
                    ->setIntitule("leger")
                    ->setModele($module1);
                    
            $manager->persist($bureau1);  
    
            $bureau2 = new Bureau();
            $bureau2->setImage("modele2.jpg")
                    ->setPrix("1300")
                    ->setDescription("simple")
                    ->setIntitule("leger")
                    ->setModele($module1);
                    
            $manager->persist($bureau2); 
                  
            $bureau3 = new Bureau();
            $bureau3->setImage("modele3.jpg")
                    ->setPrix("1500")
                    ->setDescription("simple")
                    ->setIntitule("leger")
                    ->setModele($module1);
                    
            $manager->persist($bureau3); 
    
            $bureau4 = new Bureau();
            $bureau4->setImage("modele4.jpg")
                    ->setPrix("1000")
                    ->setDescription("simple")
                    ->setIntitule("leger")
                    ->setModele($module1);
                    
            $manager->persist($bureau4);  
    
            $bureau5 = new Bureau();
            $bureau5->setImage("modele5.jpg")
                    ->setPrix("1000")
                    ->setDescription("simple")
                    ->setIntitule("leger")
                    ->setModele($module1);
                    
            $manager->persist($bureau5);  
           
                            
            //-------------------------------base papeterie----------------------------------------------------------------
            $marque1 = new Marque();
            $marque1 ->setLibelle("Rhodia");
            $manager->persist($marque1 );
            $marque2 = new Marque();
            $marque2->setLibelle("ClaireFontaine");
            $manager->persist($marque2);
        
            
            $type1 = new Type();
            $type1->setUtilisation("dessin")
                    ->setGrammage("80")
                    ->setCouleur("gray")
                    ->setMarque($marque1);
            $manager->persist($type1);

            $papeterie1 = new Papeterie();
            $papeterie1->setImage("papeterie1.jpg")
                    ->setPrix("150")
                    ->setDescription("simple")
                    ->setFormat("A4")
                    ->setType($type1);
            $manager->persist($papeterie1); 

            $papeterie2 = new Papeterie();
            $papeterie2->setImage("papeterie1.jpg")
                    ->setPrix("150")
                    ->setDescription("simple")
                    ->setFormat("A4")
                    ->setType($type1);
            $manager->persist($papeterie2); 

            $papeterie3 = new Papeterie();
            $papeterie3->setImage("papeterie1.jpg")
                    ->setPrix("150")
                    ->setDescription("simple")
                    ->setFormat("A4")
                    ->setType($type1);
            $manager->persist($papeterie3); 

            $papeterie4 = new Papeterie();
            $papeterie4->setImage("papeterie1.jpg")
                    ->setPrix("150")
                    ->setDescription("simple")
                    ->setFormat("A4")
                    ->setType($type1);
            $manager->persist($papeterie4);

            $papeterie5 = new Papeterie();
            $papeterie5->setImage("papeterie1.jpg")
                    ->setPrix("150")
                    ->setDescription("simple")
                    ->setFormat("A4")
                    ->setType($type1);
            $manager->persist($papeterie5);

         //-----------------produits entretiens----------------------------------------   
            

            $marqueprod1 = new MarqueProd();
            $marqueprod1 ->setLibelle("BioTech");
            $manager->persist($marqueprod1);

            $marqueprod2 = new MarqueProd();
            $marqueprod2->setLibelle("GreenLeaf");
            $manager->persist($marqueprod2);

            $modeleprod1 = new ModeleProd();
            $modeleprod1->setUtilisation("dessin")
                    ->setGrammage("80")
                    ->setCouleur("gray")
                    ->setMarqueProd($marqueprod1);
            $manager->persist($modeleprod1);

            $modeleprod2 = new ModeleProd();
            $modeleprod2->setUtilisation("dessin")
                    ->setGrammage("80")
                    ->setCouleur("gray")
                    ->setMarqueProd($marqueprod2);
            $manager->persist($modeleprod2);


            $prodentret1 = new ProdEntret();     
            $prodentret1->setImage("entretien1.jpg")
                    ->setPrix("150")
                    ->setDescription("simple")
                    ->setFormat("A4")
                    ->setModeleProd($modeleprod1);
            $manager->persist($prodentret1);

            $prodentret2 = new ProdEntret();     
            $prodentret2->setImage("entretien2.jpg")
                    ->setPrix("150")
                    ->setDescription("simple")
                    ->setFormat("A4")
                    ->setModeleProd($modeleprod2);
            $manager->persist($prodentret2);

            $prodentret3 = new ProdEntret();     
            $prodentret3->setImage("entretien2.jpg")
                    ->setPrix("150")
                    ->setDescription("simple")
                    ->setFormat("A4")
                    ->setModeleProd( $modeleprod2);
            $manager->persist( $prodentret3);

            $prodentret4 = new ProdEntret();     
            $prodentret4->setImage("entretien2.jpg")
                    ->setPrix("150")
                    ->setDescription("simple")
                    ->setFormat("A4")
                    ->setModeleProd($modeleprod2);
            $manager->persist($prodentret4);

            $prodentret5 = new ProdEntret();     
            $prodentret5->setImage("entretien2.jpg")
                    ->setPrix("150")
                    ->setDescription("simple")
                    ->setFormat("A4")
                    ->setModeleProd($modeleprod2);
            $manager->persist($prodentret5);



        $manager->flush();
    }
}

