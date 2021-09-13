<?php

namespace App\Entity;

use App\Repository\AgenciesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgenciesRepository::class)
 */
class Agencies
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $agencyname;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAgencyname(): ?string
    {
        return $this->agencyname;
    }

    public function setAgencyname(string $agencyname): self
    {
        $this->agencyname = $agencyname;

        return $this;
    }
}
