<?php


namespace App\Controller;


use App\Entity\Commande;
use App\Entity\Fournisseur;
use App\Entity\Jouet;
use App\Form\JouetType;
use App\Repository\CommandeRepository;
use App\Repository\FournisseurRepository;
use App\Repository\JouetRepository;
//use Doctrine\Common\Persistence\ObjectManager: '@doctrine.orm.default_entity_manager'
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
//use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SmartPlayController extends AbstractController
{
    /**
     * @var JouetRepository
     */
    private $repo_jouet;
    /**
     * @var ObjectManager
     */
    private $em;
    /**
     * @var JouetRepository
     */
    private $jouet_rep;
    /**
     * @var CommandeRepository
     */
    private $commande_repo;

    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage()
    {
        return $this->render('page/homepage.html.twig');
    }

    /**
     * @var FournisseurRepository
     */

    private $repository_four;


    public function __construct(FournisseurRepository $repository_four, JouetRepository  $jouet_rep, CommandeRepository $commande_repo){

        $this->repository_four = $repository_four;
        $this->jouet_rep = $jouet_rep;
        $this->commande_repo = $commande_repo;
    }

    /**
     * @Route("/pages/jouet", name="page_jouets")
     */
    public function Jouets(){
        $repository = $this ->getDoctrine()->getRepository(Jouet::class);
        $jouets = $repository->findAll();
        dump($jouets);
        return $this->render('page/toyspage.html.twig', [
            'jouets' =>$jouets,
        ]);
    }
    /**
     * @Route("/pages/commande", name="page_commande")
     */
    public function Commandes(){
        $commandes = $this->commande_repo->findAll();
        dump($commandes);
        return $this->render('page/orderpage.html.twig', [
            'commandes' =>$commandes,
        ]);
    }
//    /**
//     * @Route("/pages/add", name="page_add")
//     */
//    public function Add(Request $request, EntityManagerInterface $manager){
//        $repo = $this->getDoctrine()->getRepository(Jouet::class);
//        $toy = new Jouet();
//        $form  = $this->createFormBuilder($toy)
//            ->add('des_jouet',TextType::class)
//            ->add('qte_stock_jouet')
//            ->add('pu_jouet')
//            ->getForm();
//        $form->handleRequest($request);
//        if($form->isSubmitted() && $form->isValid()){
//            $codefour = $this->repository_four->find(2);
//            $toy->setCodeFourJouer($codefour);
//            $manager->persist($toy);
//            $manager->flush();
//            return $this->redirectToRoute('page_jouets');
//        }
//        return $this->render('page/addpage.html.twig', [
//            'formJouet' => $form->createView(),
//        ]);
//    }
    /**
     * @Route("/pages/{id}/delete", name="page_delete")
     */
    public function Delete($id){
        $entityManager = $this->getDoctrine()->getManager();
        $jouet = $this->jouet_rep->find($id); // repo from constructor
//        $repoCommande = $entityManager->getRepository(Commande::class);
//        $codefour = $this->repository_four->find(2);
//        if(!$toy->getCodeFourJouer()){
//            $toy->setCodeFourJouer($codefour);
//        }    //DELETE BY TESTING ON TABLE ??  EXAMPLE  up .
        dump($jouet); // deleted toy
        $entityManager->remove($jouet);
        $entityManager->flush();
        return $this->render('page/deletepage.html.twig'
        );
    }
    /**
     * @Route("/pages/add", name="page_add")
     * @Route("/pages/{id}/edit", name="page_edit")
     */
    public function Form(Jouet $toy = null, Request $request, EntityManagerInterface $manager){
        $repo = $this->getDoctrine()->getRepository(Jouet::class);
//        $jouet = $repo->find($id);
        if(!$toy){
            $toy = new Jouet();
        }

        $form = $this->createForm(JouetType::class, $toy);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $codefour = $this->repository_four->find(2);
            if(!$toy->getCodeFourJouer()){
                $toy->setCodeFourJouer($codefour);
            }

            $manager->persist($toy);
            $manager->flush();
            return $this->redirectToRoute('page_jouets');
        }
        return $this->render('page/editpage.html.twig', [
//            'jouet'=>$jouet,
            'formJouet' => $form->createView(),
            'editMode' => $toy->getId()!== null,
        ]);
    }
    /**
     * @Route("/pages/{slug}", name="page_partners")
     */
    public function Partners($slug)
    {
        //1
        dump($this->jouet_rep->findBy(array('code_four_jouer' => '3')));
        //2
        $prop=$this->jouet_rep->findMaxQty();
        dump($prop);
        //3
        $prop=$this->jouet_rep->findMinPrice();
        dump($prop);
        //4
//        $prop=$this->jouet_rep->fMax();
//        dump($prop);
        //5

//        $fournisseur = new Fournisseur();
//        $fournisseur->setDesFour('PlayTunisia');
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($fournisseur);
//        $em->flush();
//
//        $fournisseur2 = new Fournisseur();
//        $fournisseur2->setDesFour('ImportSmart');
//        $em2 = $this->getDoctrine()->getManager();
//        $em2->persist($fournisseur2);
//        $em2->flush();
//
//        $fournisseur3 = new Fournisseur();
//        $fournisseur3->setDesFour('EduGame');
//        $em3 = $this->getDoctrine()->getManager();
//        $em3->persist($fournisseur3);
//        $em3->flush();

//
//        $codefour = $this->repository_four->find(2);
////Jouet1
//        $jouet1 = new Jouet();
//        $jouet1->setDesJouet('Camionnette Lego')
//            ->setQteStockJouet(130)
//            ->setPUJouet(20,000)
//            ->setCodeFourJouer($codefour);
//        $em1 = $this->getDoctrine()->getManager();
//        $em1->persist($jouet1);
//        $em1->flush();
////Jouet2
//        $jouet2 = new Jouet();
//        $jouet2->setDesJouet('Voiture telecomndee')
//            ->setQteStockJouet(120)
//            ->setPUJouet(45,500)
//            ->setCodeFourJouer($codefour);
//        $em2 = $this->getDoctrine()->getManager();
//        $em2->persist($jouet2);
//        $em2->flush();
////Jouet3
//        $codefour = $this->repository_four->find(3);
//        $jouet3 = new Jouet();
//        $jouet3->setDesJouet('PUZZLE LA REINE DES NEIGES')
//            ->setQteStockJouet(300)
//            ->setPUJouet(23)
//            ->setCodeFourJouer($codefour);
//        $em3 = $this->getDoctrine()->getManager();
//        $em3->persist($jouet3);
//        $em3->flush();
////Jouet4
//        $jouet4 = new Jouet();
//        $jouet4->setDesJouet('SCRABBLE')
//            ->setQteStockJouet(270)
//            ->setPUJouet(32,000)
//            ->setCodeFourJouer($codefour);
//        $em4 = $this->getDoctrine()->getManager();
//        $em4->persist($jouet4);
//        $em4->flush();
////jouet5
//        $jouet5 = new Jouet();
//        $jouet5->setDesJouet('mONOPOLY')
//            ->setQteStockJouet(300)
//            ->setPUJouet(34,600)
//            ->setCodeFourJouer($codefour);
//        $em5 = $this->getDoctrine()->getManager();
//        $em5->persist($jouet5);
//        $em5->flush();

        return $this->render('page/partners.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),

        ]);
    }
}