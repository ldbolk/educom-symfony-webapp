<?php

namespace App\Repository;

use App\Entity\Artiest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Artiest>
 *
 * @method Artiest|null find($id, $lockMode = null, $lockVersion = null)
 * @method Artiest|null findOneBy(array $criteria, array $orderBy = null)
 * @method Artiest[]    findAll()
 * @method Artiest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArtiestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Artiest::class);
    }

    public function saveArtiest($params) {
        $artiest = new Artiest();
        $artiest->setNaam($params["naam"]);
        $artiest->setGenre($params["genre"]);
        $artiest->setOmschrijving($params["omschrijving"]);
        $artiest->setAfbeeldingUrl($params["afbeelding_url"]);
        $artiest->setWebsite($params["website"]);

        $this->_em->persist($artiest);
        $this->_em->flush();

        return($artiest);
    }

    public function deleteArtiest($id) {
        
        $artiest = $this->find($id);
        // dd($artiest);
        if($artiest) {
            $this->_em->remove($artiest);
            $this->_em->flush();
            return(true);
        }
    
        return(false);
    }

    public function fetchArtiest($id) {
        return ($this->find($id));
    }

    public function add(Artiest $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Artiest $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Artiest[] Returns an array of Artiest objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Artiest
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
