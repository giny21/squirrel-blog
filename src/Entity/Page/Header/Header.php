<?php

namespace App\Entity\Page\Header;

use App\Entity\User\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Page\Header\HeaderRepository")
 */
class Header
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
    private $heroTitle;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $heroSubtitle;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Page\Header\HeaderImage")
     */
    private $heroImage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Page\Header\HeaderAvatar")
     */
    private $headerAvatar;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeroTitle(): ?string
    {
        return $this->heroTitle;
    }

    public function setHeroTitle(string $heroTitle): self
    {
        $this->heroTitle = $heroTitle;

        return $this;
    }

    public function getHeroSubtitle(): ?string
    {
        return $this->heroSubtitle;
    }

    public function setHeroSubtitle(?string $heroSubtitle): self
    {
        $this->heroSubtitle = $heroSubtitle;

        return $this;
    }

    public function getHeroImage(): ?HeaderImage
    {
        return $this->heroImage;
    }

    public function setHeroImage(?HeaderImage $heroImage): self
    {
        $this->heroImage = $heroImage;

        return $this;
    }

    public function getHeaderAvatar(): ?HeaderAvatar
    {
        return $this->headerAvatar;
    }

    public function setHeaderAvatar(?HeaderAvatar $headerAvatar): self
    {
        $this->headerAvatar = $headerAvatar;

        return $this;
    }

    public function getHeaderImageImage(): ?string
    {
        return $this->heroImage ? $this->heroImage->getImage() : null;
    }

    public function getHeaderAvatarImage(): ?string
    {
        return $this->headerAvatar ? $this->headerAvatar->getImage() : null;
    }
}
