<?php

namespace App\Controller;

use App\Entity\Agencies;
use App\Entity\Agent;
use App\Entity\Designation;
use App\Entity\Fournisseur;
use App\Entity\Materiel;
use App\Entity\Services;
use App\Entity\TypeMateriel;
use App\Entity\User;
use App\Form\Type\TaskType;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/profile", name="profile")
     */
    public function profile(): Response
    {
        $user = $this->getUser();
        return $this->render('home/profile.html.twig',[
            'user' => $user,
        ]);
    }

    /**
     * @Route("/editprofile", name="edit_profile")
     */
    public function editProfile(Request $request, UserPasswordEncoderInterface $passwordEncoder ): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(TaskType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $user = $form->getData($user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('password')->getData()
                )));
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('profile');
            
        }

        return $this->render('home/editProfile.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/dasboard", name="dashboard")
     */
    public function dashboard(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Materiel::class);
        $materials = $repo->findAll();
        return $this->render('home/dashboard.html.twig',[
            'materials' =>$materials,
        ]);
    }

     /**
     * @Route("agencies", name="agencies")
     */
    public function agencies(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Agencies::class);
        $agencies = $repo->findAll();
        //$agencyid = $agencies->getId();
        //dd($agencies);
        return $this->render('tables/agencies.html.twig',[
            'agencies' => $agencies,
        ]);
    }

     /**
     * @Route("agents", name="agents")
     */
    public function agents(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Agent::class);
        $agents = $repo->findAll();
        return $this->render('tables/agents.html.twig',[
            'agents' => $agents,
        ]);
    }

     /**
     * @Route("designations", name="designations")
     */
    public function designations(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Designation::class);
        $designations = $repo->findAll();
        return $this->render('tables/designations.html.twig',[
            'designations' => $designations,
        ]);
    }

     /**
     * @Route("fournisseurs", name="fournisseurs")
     */
    public function fournisseurs(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Fournisseur::class);
        $fournisseurs = $repo->findAll();
        return $this->render('tables/fournisseurs.html.twig',[
            'fournisseurs' => $fournisseurs,
        ]);
    }

     /**
     * @Route("services", name="services")
     */
    public function services(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Services::class);
        $services = $repo->findAll();
        return $this->render('tables/services.html.twig',[
            'services' => $services,
        ]);
    }

     /**
     * @Route("typematerial", name="type_material")
     */
    public function typeMaterial(): Response
    {
        $repo = $this->getDoctrine()->getRepository(TypeMateriel::class);
        $typeMateroials = $repo->findAll();
        return $this->render('tables/typeMaterial.html.twig',[
            'type' => $typeMateroials,
        ]);
    }

     /**
     * @Route("users", name="users")
     */
    public function users(): Response
    {
        $repo = $this->getDoctrine()->getRepository(User::class);
        $users = $repo->findAll();
        return $this->render('tables/users.html.twig',[
            'users' => $users,
        ]);
    }

}
