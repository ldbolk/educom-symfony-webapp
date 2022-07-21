<?php

namespace App\Repository;

use App\Entity\Optreden;

use App\Entity\Artiest;
use App\Entity\Poppodium;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;



/**
 * @extends ServiceEntityRepository<Optreden>
 *
 * @method Optreden|null find($id, $lockMode = null, $lockVersion = null)
 * @method Optreden|null findOneBy(array $criteria, array $orderBy = null)
 * @method Optreden[]    findAll()
 * @method Optreden[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OptredenRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Optreden::class);
    }
    
    
    public function getAllOptredens() {
        $optredens = $this->findAll();
    }
    
    public function saveOptreden($params) {

        if(isset($params["id"]) && $params["id"] != "") {
            $optreden = $this->find($params["id"]);
        } else {
            $optreden = new Optreden();
        }

        // if(isset($params["voorprogramma_id"])) {
        //     $optreden->setVoorProgramma($this->fetchArtiest($params["voorprogramma_id"]));
        // }
        $optreden->setPodium($params["poppodium"]);
        $optreden->setArtiest($params["artiest"]);
        $optreden->setVoorprogramma($params["voorprogramma"]);
        $optreden->setOmschrijving($params["omschrijving"]);
        $optreden->setDatum($params["datum"]);
        $optreden->setPrijs($params["prijs"]);
        $optreden->setTicketUrl($params["ticket_url"]);
        $optreden->setAfbeeldingUrl($params["afbeelding_url"]);

        $this->_em->persist($optreden);
        $this->_em->flush();

        return($optreden);
    }

    // public function add(Optreden $entity, bool $flush = false): void
    // {
    //     $this->getEntityManager()->persist($entity);

    //     if ($flush) {
    //         $this->getEntityManager()->flush();
    //     }
    // }

    // public function remove(Optreden $entity, bool $flush = false): void
    // {
    //     $this->getEntityManager()->remove($entity);

    //     if ($flush) {
    //         $this->getEntityManager()->flush();
    //     }
    // }

//    /**
//     * @return Optreden[] Returns an array of Optreden objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Optreden
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
