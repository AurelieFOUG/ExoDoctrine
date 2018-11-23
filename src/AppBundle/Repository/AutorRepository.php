<?php

namespace AppBundle\Repository;

/**
 * AuthorRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AutorRepository extends \Doctrine\ORM\EntityRepository
{
    public function getBooksByPays($pays)
    {
        //La variable contient une instance du QueryBuilder via une méthode createQueryBuilder
        $queryBuilder = $this->createQueryBuilder('a');

        //Va récupérer dans la Bdd
        $query = $queryBuilder
            ->select('a')
            ->where('a.pays = :pays')
            ->setParameter('pays', $pays)
            ->getQuery();

        $results = $query->getArrayResult();

        return $results;
    }

    public function getFindWord($word)
    {
        $queryBuilder = $this->createQueryBuilder('a');

        $query = $queryBuilder
            ->select('a')
            ->where('a.biography LIKE :word')
            ->setParameter('word', '%'.$word.'%')
            ->getQuery();

        $results = $query->getArrayResult();

        return $results;
    }


}