<?php
declare(strict_types=1);

namespace HiringBundle\Manager;

use HiringBundle\Model\DemandsFilters;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DemandsManager
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * DemandsManager constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getDemandsByFilters(DemandsFilters $filters)
    {
        return $this->getDemandsRepository()->getDemandsByFilters($filters);
    }

    private function getDemandsRepository()
    {
        return $this->container->get('hiring.repository.demands_repository');
    }
}
