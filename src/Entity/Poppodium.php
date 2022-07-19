<?php

namespace App\Entity;

use App\Repository\PoppodiumRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PoppodiumRepository::class)]
class Poppodium
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $naam = null;

    #[ORM\Column(length: 50)]
    private ?string $adres = null;

    #[ORM\Column(length: 50)]
    private ?string $postcode = null;

    #[ORM\Column(length: 50)]
    private ?string $woonplaats = null;

    #[ORM\Column(length: 50)]
    private ?string $telefoonnummer = null;

    #[ORM\Column(length: 50)]
    private ?string $email = null;

    #[ORM\Column(length: 50)]
    private ?string $website = null;

    #[ORM\Column(length: 50)]
    private ?string $logo_url = null;

    #[ORM\Column(length: 50)]
    private ?string $afbeelding_url = null;

    #[ORM\OneToMany(mappedBy: 'poppodium', targetEntity: Optreden::class)]
    private Collection $poppodiumOptredens;

    public function __construct()
    {
        $this->poppodiumOptredens = new ArrayCollection();
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

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(string $adres): self
    {
        $this->adres = $adres;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getWoonplaats(): ?string
    {
        return $this->woonplaats;
    }

    public function setWoonplaats(string $woonplaats): self
    {
        $this->woonplaats = $woonplaats;

        return $this;
    }

    public function getTelefoonnummer(): ?string
    {
        return $this->telefoonnummer;
    }

    public function setTelefoonnummer(string $telefoonnummer): self
    {
        $this->telefoonnummer = $telefoonnummer;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getLogoUrl(): ?string
    {
        return $this->logo_url;
    }

    public function setLogoUrl(string $logo_url): self
    {
        $this->logo_url = $logo_url;

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

    /**
     * @return Collection<int, Optreden>
     */
    public function getPoppodiumOptredens(): Collection
    {
        return $this->poppodiumOptredens;
    }

    public function addPoppodiumOptreden(Optreden $poppodiumOptreden): self
    {
        if (!$this->poppodiumOptredens->contains($poppodiumOptreden)) {
            $this->poppodiumOptredens[] = $poppodiumOptreden;
            $poppodiumOptreden->setPoppodium($this);
        }

        return $this;
    }

    public function removePoppodiumOptreden(Optreden $poppodiumOptreden): self
    {
        if ($this->poppodiumOptredens->removeElement($poppodiumOptreden)) {
            // set the owning side to null (unless already changed)
            if ($poppodiumOptreden->getPoppodium() === $this) {
                $poppodiumOptreden->setPoppodium(null);
            }
        }

        return $this;
    }
}
