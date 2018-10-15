<?php
declare(strict_types=1);

namespace HiringBundle\Repository;

use Doctrine\ORM\EntityRepository;
use HiringBundle\Model\DemandsFilters;

class DemandsRepository extends EntityRepository
{
    public function getDemandsByFilters(DemandsFilters $filters)
    {
        $demandsQueryBuilder = $this->createQueryBuilder('demands')->orderBy('demands.createdAt', 'DESC');

        $maxDate = $filters->getMaxDate() !== null ? clone $filters->getMaxDate() : new \DateTime();
        $maxDate->setTime(23, 59, 59);

        $minDate = $filters->getMinDate() !== null ? clone $filters->getMinDate() : new \DateTime();
        $minDate->setTime(00, 00, 00);

        if ($filters->getMinDate() === null) {
            $demandsQueryBuilder
                ->where('demands.createdAt <= :maxDate')
                ->setParameter('maxDate', $maxDate);
        } else {
            $demandsQueryBuilder
                ->where('demands.createdAt BETWEEN :minDate AND :maxDate')
                ->setParameter('minDate', $minDate)
                ->setParameter('maxDate', $maxDate);
        }

        return $demandsQueryBuilder->getQuery()->getResult();
    }
}
