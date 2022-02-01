<?php

namespace App\Controller;

use App\Helpers\EntityManagerHelper as Em;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use App\Entity\Book;
use App\Entity\User;
use App\Entity\Rate;


class NoteController
{

    const NEEDLES = [
        "title",
        "summary",
        "n_isbn"
    ];

    const NEEDLES2 = [
        "comment",
        "note"
    ];

    public static function index()
    {
        $entityManager = Em::getEntityManager();
    }



    public function show(string $sId)
    {

        //echo("tu es dans : controller>bookcontroller>show");

        $entityManager = Em::getEntityManager();

        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Note"));

        $oBook = $repository->find((int) $sId);

        // var_dump($oBook);
        // die('---END---');

        print("  titre :   ");
        print($oBook->getComment());
        print("  resumé :   ");
        print($oBook->getNote());

    }


    public function delete(string $sId)
    {
        $entityManager = Em::getEntityManager();
        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Note"));

        $oRate = $repository->find($sId);

        $entityManager->remove($oRate);

        $entityManager->flush();
    }
}
