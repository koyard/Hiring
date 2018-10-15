<?php
declare(strict_types=1);

namespace HiringBundle\Model;

class DemandsFilters
{

    /** @var \DateTime */
    protected $minDate;

    /** @var \DateTime */
    protected $maxDate;

    /**
     * @return \DateTime
     */
    public function getMinDate(): ?\DateTime
    {
        return $this->minDate;
    }

    /**
     * @param \DateTime $minDate
     */
    public function setMinDate(\DateTime $minDate): void
    {
        $this->minDate = $minDate;
    }

    /**
     * @return \DateTime
     */
    public function getMaxDate(): ?\DateTime
    {
        return $this->maxDate;
    }

    /**
     * @param \DateTime $maxDate
     */
    public function setMaxDate(?\DateTime $maxDate): void
    {
        $this->maxDate = $maxDate;
    }
}
