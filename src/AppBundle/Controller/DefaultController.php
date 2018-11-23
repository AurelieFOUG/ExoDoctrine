<?php
/**
 * Le namespace est le "chemin" permettant de cibler la classe et l'identifier
 */
namespace AppBundle\Controller;

//C'est le namespace des classes qui vont etre utiliéses dans cette class DefaultController
use AppBundle\Entity\Autor;
use AppBundle\Entity\Book;
use http\Exception\InvalidArgumentException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

//Déclaration de la class qui hérite de la classe Controller
class DefaultController extends Controller
{

    /**
     * @Route("/book", name="book")
     *Fonctionnalité (composant le Router de Symfony) permettant d'afficher la page BookTest
     * Le router lie un chemin à une action de controleur. L'action de controleur
     * affiche un fichier twig (qui lui meme appelle la base) = réponse HTTP envoyée au client
     * Cette méthode va afficher un article (1) de l'Entité "Book" (qui est le miroir de la table Book dans la Bdd)
     * C'est un affiche brut avec le var_dump
     *
     */
    public function BookTest()
    {
        $repository = $this->getDoctrine()->getRepository(Book::class);

        $Livre = $repository->find(1);

        var_dump($Livre); die;
    }

    /**
     * @Route("/authors", name="authors")
     * Cette méthode appel le framework Doctrine et crée une instance de Doctrine (getDoctrine, et héritage Controller on accède à Doctrine),
     * puis un appel au repository (méthode de doctrine),
     * qui va chercher / récupérer toute l'Entité Autor. Tout ceci sera stocké dans une variable.
     * Ensuite on fait appel à une méthode de repository qui va demander de récupérer tout dans l'entite.
     * Le render permet d'afficher le resultat dans un twig.
     * $Auteur contient une liste d'objet, c'est une instance de l'entité Autor. Pour chaque entrée on va avoir une entrée.
     */
    public function ListAuthorsAction()
    {
        $repository = $this->getDoctrine()->getRepository(Autor::class);

        $Auteur = $repository->findAll();

        return $this->render("@App/author.html.twig",
            [
                'tableaux' => $Auteur
            ]);

    }

    /**
     * @Route("/author/{id}", name="author")
     * On a créé un lien sur le nom des auteurs, renvoyant vers cette méthode, qui va afficher un auteur sur une nouvelle page
     */
    public function InfoAuthorAction($id)
    {
        $repository = $this->getDoctrine()->getRepository(Autor::class);

        $Auteur = $repository->find($id);

        return $this->render('@App/onlyauthor.html.twig',
        [
            'author' => $Auteur
        ]);
    }

    /**
     * @Route("/livresbygenre/{genre}", name="livres_by_Genre")
     * On crée une méthode qui sera déclarée dans le Repository, dans BookRepository
     */
    public function BooksGenreAction($genre)
    {
        $repository = $this->getDoctrine()->getRepository(Book::class);

        $Auteurs = $repository->getBooksByGenre($genre);

        return $this->render('@App/genre.html.twig',
            [
               'auteurs' => $Auteurs
            ]);
    }

    /**
     * @Route("/paysauteur/{id}", name="pays_auteur")
     * Je récupère une instance de Doctrine qui appelle une instense de repository
     */
    public function PaysAuthorsAction($id)
    {
        $repository = $this->getDoctrine()->getRepository(Autor::class);

        $Land = $repository->getBooksByPays($id);

        return $this->render('@App/pays.html.twig',
        [
            'listes' => $Land
        ]);
    }


    /**
     * @Route("/recherche", name="recherche")
     *
     */
    public function FindWordAction(Request $request)
    {
        $word = $request->query->get('recherche');

        $repository = $this->getDoctrine()->getRepository(Autor::class);

        $biographyes = $repository->getFindWord($word);

        return $this->render('@App/recherche.html.twig',
        [
            'biographyes' => $biographyes
        ]);
    }



}
