<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AutomobileRepository")
 */
class Automobile
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
    private $img_name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $posted_at;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tags;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImgName(): ?string
    {
        return $this->img_name;
    }

    public function setImgName(string $img_name): self
    {
        $this->img_name = $img_name;

        return $this;
    }

    public function getPostedAt(): ?\DateTimeInterface
    {
        return $this->posted_at;
    }

    public function setPostedAt(\DateTimeInterface $posted_at): self
    {
        $this->posted_at = $posted_at;

        return $this;
    }

    public function getTags(): ?string
    {
        return $this->tags;
    }

    public function setTags(?string $tags): self
    {
        $this->tags = $tags;

        return $this;
    }
}
