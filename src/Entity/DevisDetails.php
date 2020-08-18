<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\DevisDetailsRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=DevisDetailsRepository::class)
 * @ApiResource()
 */
class DevisDetails
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $amount;

    /**
     * @ORM\Column(type="float")
     */
    private $unitPrice;

    /**
     * @ORM\ManyToOne(targetEntity=Devis::class, inversedBy="devisDetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $devis;

    /**
     * @ORM\ManyToOne(targetEntity=Task::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $task;

    /**
     * @ORM\Column(type="float")
     */
    private $labor;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $materials;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getUnitPrice(): ?float
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(float $unitPrice): self
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    public function getDevis(): ?Devis
    {
        return $this->devis;
    }

    public function setDevis(?Devis $devis): self
    {
        $this->devis = $devis;

        return $this;
    }

    public function getTask(): ?Task
    {
        return $this->task;
    }

    public function setTask(?Task $task): self
    {
        $this->task = $task;

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
}
