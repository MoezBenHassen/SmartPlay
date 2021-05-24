<?php

namespace App\Entity;

use App\Repository\JouetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JouetRepository::class)
 */
class Jouet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $des_jouet;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $qte_stock_jouet;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $PU_jouet;

    /**
     * @ORM\ManyToOne(targetEntity=Fournisseur::class, inversedBy="jouets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $code_four_jouer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesJouet(): ?string
    {
        return $this->des_jouet;
    }

    public function setDesJouet(?string $des_jouet): self
    {
        $this->des_jouet = $des_jouet;

        return $this;
    }

    public function getQteStockJouet(): ?int
    {
        return $this->qte_stock_jouet;
    }

    public function setQteStockJouet(?int $qte_stock_jouet): self
    {
        $this->qte_stock_jouet = $qte_stock_jouet;

        return $this;
    }

    public function getPUJouet(): ?float
    {
        return $this->PU_jouet;
    }

    public function setPUJouet(?float $PU_jouet): self
    {
        $this->PU_jouet = $PU_jouet;

        return $this;
    }

    public function getCodeFourJouer(): ?Fournisseur
    {
        return $this->code_four_jouer;
    }

    public function setCodeFourJouer(?Fournisseur $code_four_jouer): self
    {
        $this->code_four_jouer = $code_four_jouer;

        return $this;
    }
}
