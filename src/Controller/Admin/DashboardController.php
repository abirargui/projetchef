<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Entity\Etudiant;
use App\Entity\Enseignant;
use App\Entity\Groupe;
use App\Entity\Matiere;
use App\Entity\DirecteurDeDepart;
use App\Entity\Directiondesetudesetdestage;
use App\Entity\Anneeuniversitaire;
use App\Entity\Departement;
use App\Entity\Secrétaire;
use App\Entity\Semestre;
use App\Entity\User;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="dashboard")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Gestion absence');
    }


    public function configureUserMenu(UserInterface $user): UserMenu
    {
        return parent::configureUserMenu($user)
            ->setName($user->getUserIdentifier())
            ->setGravatarEmail($user->getEmail())
         //   ->setAvatarUrl('https://www.clipartmax.com/png/full/405-4050774_avatar-icon-flat-icon-shop-download-free-icons-for-avatar-icon-flat.png')
            ->displayUserAvatar(true);
    }



    public function configureAssets(): Assets
    {
        return Assets::new()->addCssFile('build/css/admin.css');
    }







    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);


        yield MenuItem::linkToCrud('Enseignant', 'fas fa-list', Enseignant::class);
        yield MenuItem::linkToCrud('Secretaire', 'fas fa-list', Secretaire::class);
        yield MenuItem::linkToCrud('Etudiant', 'fas fa-list', Etudiant::class);
        yield MenuItem::linkToCrud('Semestre', 'fas fa-list', Semestre::class);

        yield MenuItem::linkToCrud('Anneeuniversitaire', 'fas fa-list', Anneeuniversitaire::class);
        yield MenuItem::linkToCrud('Matiere', 'fas fa-list', Matiere::class);
        yield MenuItem::linkToCrud('Departement', 'fas fa-list', Departement::class);
        yield MenuItem::linkToCrud('DirecteurDeDepart', 'fas fa-list', DirecteurDeDepart::class);

        yield MenuItem::linkToCrud('Directiondesetudesetdestage', 'fas fa-list', Directiondesetudesetdestage::class);
        yield MenuItem::linkToCrud('Groupe', 'fas fa-list', Groupe::class);
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);




    }
}
