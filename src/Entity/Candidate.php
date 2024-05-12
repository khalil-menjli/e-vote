<?php

namespace App\Entity;

use App\Repository\CandidateRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\PseudoTypes\True_;

#[ORM\Entity(repositoryClass: CandidateRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_USENAME', fields: ['usename'])]
class Candidate extends User
{

    #[ORM\OneToOne(inversedBy: 'candidate', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: True)]
    private ?Demand $demeand = null;

    
    public function getDemeand(): ?Demand
    {
        return $this->demeand;
    }

    public function setDemeand(Demand $demeand): static
    {
        $this->demeand = $demeand;

        return $this;
    }
     
}
