<?php

namespace App\Entity;

use App\Repository\ServicesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServicesRepository::class)
 */
class Services
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
    private $servicesname;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServicesname(): ?string
    {
        return $this->servicesname;
    }

    public function setServicesname(string $servicesname): self
    {
        $this->servicesname = $servicesname;

        return $this;
    }
}
