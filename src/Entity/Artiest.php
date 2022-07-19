<?php

namespace App\Entity;

use App\Repository\ArtiestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtiestRepository::class)]
class Artiest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $naam = null;

    #[ORM\Column(length: 50)]
    private ?string $genre = null;

    #[ORM\Column(length: 100)]
    private ?string $omschrijving = null;

    #[ORM\Column(length: 50)]
    private ?string $afbeelding_url = null;

    #[ORM\Column(length: 50)]
    private ?string $website = null;

    #[ORM\OneToMany(mappedBy: 'artiest', targetEntity: Optreden::class)]
    private Collection $artiestOptredens;

    #[ORM\OneToMany(mappedBy: 'voorprogramma', targetEntity: Optreden::class)]
    private Collection $artiestVoorprogramma;

    public function __construct()
    {
        $this->artiestOptredens = new ArrayCollection();
        $this->artiestVoorprogramma = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getOmschrijving(): ?string
    {
        return $this->omschrijving;
    }

    public function setOmschrijving(string $omschrijving): self
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    public function getAfbeeldingUrl(): ?string
    {
        return $this->afbeelding_url;
    }

    public function setAfbeeldingUrl(string $afbeelding_url): self
    {
        $this->afbeelding_url = $afbeelding_url;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): self
    {
        $this->website = $website;

        return $this;
    }

    /**
     * @return Collection<int, Optreden>
     */
    public function getArtiestOptredens(): Collection
    {
        return $this->artiestOptredens;
    }

    public function addArtiestOptreden(Optreden $artiestOptreden): self
    {
        if (!$this->artiestOptredens->contains($artiestOptreden)) {
            $this->artiestOptredens[] = $artiestOptreden;
            $artiestOptreden->setArtiest($this);
        }

        return $this;
    }

    public function removeArtiestOptreden(Optreden $artiestOptreden): self
    {
        if ($this->artiestOptredens->removeElement($artiestOptreden)) {
            // set the owning side to null (unless already changed)
            if ($artiestOptreden->getArtiest() === $this) {
                $artiestOptreden->setArtiest(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Optreden>
     */
    public function getArtiestVoorprogramma(): Collection
    {
        return $this->artiestVoorprogramma;
    }

    public function addArtiestVoorprogramma(Optreden $artiestVoorprogramma): self
    {
        if (!$this->artiestVoorprogramma->contains($artiestVoorprogramma)) {
            $this->artiestVoorprogramma[] = $artiestVoorprogramma;
            $artiestVoorprogramma->setVoorprogramma($this);
        }

        return $this;
    }

    public function removeArtiestVoorprogramma(Optreden $artiestVoorprogramma): self
    {
        if ($this->artiestVoorprogramma->removeElement($artiestVoorprogramma)) {
            // set the owning side to null (unless already changed)
            if ($artiestVoorprogramma->getVoorprogramma() === $this) {
                $artiestVoorprogramma->setVoorprogramma(null);
            }
        }

        return $this;
    }
}
