<?php

namespace App\Controller;

use App\Helpers\EntityManagerHelper as Em;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use App\Entity\Book;
use App\Entity\User;


class BookController
{

    const NEEDLES = [
        "title",
        "summary",
        "n_isbn"
    ];

    public static function index()
    {
        $entityManager = Em::getEntityManager();
    }



    public function show(string $sId)
    {

        //echo("tu es dans : controller>bookcontroller>show");

        $entityManager = Em::getEntityManager();

        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Book"));

        $oBook = $repository->find((int) $sId);

        // var_dump($oBook);
        // die('---END---');

        print("  titre :   ");
        print($oBook->getTitle());
        print("  resumé :   ");
        print($oBook->getSummary());
    }



    public function add()
    {

        //echo("tu es dans : add");
        $entityManager = Em::getEntityManager();

        echo ('<form action="http://localhost/bibliotheque/addarticle" method="POST">

            <div>
                <label for="title">Titre :</label>
               <input type="text" id="title" name="title" />
            </div>
        
            <div>
                <label for="summary">Text :</label>
               <input type="text" id="summary" name="summary" />
            </div>
        
            <div>
                <label for="n_isbn">isbn :</label>
               <input type="number" id="n_isbn" name="n_isbn" />
            </div>
            
            <div class="button">
               <button type="submit">Envoyer</button>
            </div>       
        
        </form>');

        if (!empty($_POST)) {

            foreach (self::NEEDLES as $value) {

                if ($_POST[$value] !== "") {
                    $_POST[$value] = htmlentities(strip_tags($_POST[$value]));
                }
            }

            $author = new User("mptest_utime", "tmpe@gmail.cm");
            $entityManager->persist($author);

            $editor = new User("pemncoe-", "tpem@truc.cm");
            $entityManager->persist($editor);

            $new_article = new Book($_POST['title'], $_POST['summary'], (int) $_POST['n_isbn'], $author, $editor);
            $entityManager->persist($new_article);
            $entityManager->flush();
        }
    }



    public function modify(string $sId)
    {

        $entityManager = Em::getEntityManager();
        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Book"));

        $oBook = $repository->find((int)$sId);
        $Title= $oBook->getTitle();
        // var_dump($Title);
        // die('---END---');
        $Summary=$oBook->getSummary();
        $ISBN=$oBook->getN_isbn();


        echo'

        <form action="" method="POST">

            <div>
                <label for="title">Titre :</label>
               <input type="text" id="title" name="title" value="'.$Title.'" />
            </div>
        
            <div>
                <label for="summary">Text :</label>
               <input type="text" id="text" name="summary" value="'.$Summary.'" />
            </div>
        
            <div>
                <label for="n_isbn">isbn :</label>
               <input type="text" id="n_isbn" name="n_isbn" value="'.$ISBN.'" />
            </div>
            
            <div class="button">
               <button type="submit">Envoyer</button>
            </div>       
        
        </form>

        ';


        if (!empty($_POST)) {

            echo('nouveau titre = '.$_POST['title']. 'nouveau text='.$_POST['summary'].'nouveau ISBN='.$_POST['n_isbn']);

            foreach (self::NEEDLES as $value) {

                if (!array_key_exists($value, $_POST)) {
                    echo ("error"); die;
                }

                if ($_POST[$value] !== "") {
                    $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));
                }
            }


            if ($_POST["title"] !== $oBook->getTitle()) {

                $oBook->setTitle($_POST['title']);
            }
        

            if ($_POST["summary"] !== $oBook->getSummary()) {

                $oBook->setSummary($_POST['summary']);
            }

            if ($_POST["n_isbn"] !== $oBook->getN_isbn()) {

                $oBook->setN_isbn($_POST['n_isbn']);
            }

            $entityManager->persist($oBook);
            $entityManager->flush();
        }

        //include(__DIR__ . "/../vues/modifyarticle.php");
    }



    public function delete(string $sId)
    {
        $entityManager = Em::getEntityManager();
        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Book"));

        $oBook = $repository->find($sId);

        $entityManager->remove($oBook);

        $entityManager->flush();
    }
}
