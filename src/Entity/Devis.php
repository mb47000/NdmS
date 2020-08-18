<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\DevisRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=DevisRepository::class)
 * @ApiResource()
 */
class Devis
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titled;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="devis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customer;

    /**
     * @ORM\OneToMany(targetEntity=DevisDetails::class, mappedBy="devis", orphanRemoval=true)
     */
    private $devisDetails;

    public function __construct()
    {
        $this->devisDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getCustomer(): ?customer
    {
        return $this->customer;
    }

    public function setCustomer(?customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return Collection|DevisDetails[]
     */
    public function getDevisDetails(): Collection
    {
        return $this->devisDetails;
    }

    public function addDevisDetail(DevisDetails $devisDetail): self
    {
        if (!$this->devisDetails->contains($devisDetail)) {
            $this->devisDetails[] = $devisDetail;
            $devisDetail->setDevis($this);
        }

        return $this;
    }

    public function removeDevisDetail(DevisDetails $devisDetail): self
    {
        if ($this->devisDetails->contains($devisDetail)) {
            $this->devisDetails->removeElement($devisDetail);
            // set the owning side to null (unless already changed)
            if ($devisDetail->getDevis() === $this) {
                $devisDetail->setDevis(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->titled.'(n°'.$this->id.') '.$this->customer;
    }
}
