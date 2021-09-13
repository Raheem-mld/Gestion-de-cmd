<?php

namespace App\Entity;

use App\Repository\AgentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgentRepository::class)
 */
class Agent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $agentnumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $agentname;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAgentnumber(): ?int
    {
        return $this->agentnumber;
    }

    public function setAgentnumber(int $agentnumber): self
    {
        $this->agentnumber = $agentnumber;

        return $this;
    }

    public function getAgentname(): ?string
    {
        return $this->agentname;
    }

    public function setAgentname(string $agentname): self
    {
        $this->agentname = $agentname;

        return $this;
    }
}
