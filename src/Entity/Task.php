<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=taskRepository::class)
 */
class Task
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titled;

    /**
     * @ORM\Column(type="float")
     */
    private $labor;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $materials;

    /**
     * @ORM\ManyToOne(targetEntity=Unit::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $unit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitled(): ?string
    {
        return $this->titled;
    }

    public function setTitled(string $titled): self
    {
        $this->titled = $titled;

        return $this;
    }

    public function getLabor(): ?float
    {
        return $this->labor;
    }

    public function setLabor(float $labor): self
    {
        $this->labor = $labor;

        return $this;
    }

    public function getMaterials(): ?float
    {
        return $this->materials;
    }

    public function setMaterials(?float $materials): self
    {
        $this->materials = $materials;

        return $this;
    }

    public function getUnit(): ?Unit
    {
        return $this->unit;
    }

    public function setUnit(?Unit $unit): self
    {
        $this->unit = $unit;

        return $this;
    }
}
