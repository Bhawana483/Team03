<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
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
    private $name;  

    /** 
     * @ORM\Column(type="string", columnDefinition="ENUM('cotton', 'nylon', 'silk','other')") 
     */
    private $cloth_type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $color;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $brand;

    /**
     * @ORM\Column(type="float")
     */
    private $cost;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=ClothCategory::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $manager;
    /** 
     * @ORM\Column(type="string", columnDefinition="ENUM('male', 'female', 'kids')") 
     */
    private $section;

    /** 
     * @ORM\Column(type="string", columnDefinition="ENUM('XL', 'L', 'M', 'S')") 
     */
    private $size;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /** 
     * @ORM\Column(type="string", columnDefinition="ENUM('high ','average')") 
     */
    private $quality;

    /** 
     * @ORM\Column(type="string", columnDefinition="ENUM('slim fit', 'loose fit', 'normal')") 
     */
    private $good_fit;
    /** 
     * @ORM\Column(type="string", columnDefinition="ENUM('highly attractive', 'fine', 'normal')") 
     */
    private $attractiveness;

    
    /** 
     * @ORM\Column(type="string", columnDefinition="ENUM('solid', 'printed', 'checks','other')") 
     */
    private $pattern;

    /** 
     * @ORM\Column(type="string", columnDefinition="ENUM('full length','short length', 'knee length' ,'normal')") 
     */
    private $length;

    /** 
     * @ORM\Column(type="string", columnDefinition="ENUM('','round neck', 'v neck', 'deep neck')") 
     */
    private $neck;

    /** 
     * @ORM\Column(type="string", columnDefinition="ENUM('traditional', 'party wear', 'casual wear','formal wear')") 
     */
    private $occasion;

    /** 
     * @ORM\Column(type="string", columnDefinition="ENUM('','full sleeve', 'mega sleeve', 'lantern sleeve')") 
     */
    private $sleeve;
    /** 
     * @ORM\Column(type="string", columnDefinition="ENUM('made in india', 'made in zimbawe', 'made in britain','others')") 
    */
    private $origin;

    /**
     * @ORM\Column(type="text", length=255)
     */
    private $description;
    /** 
     * @ORM\Column(type="string", columnDefinition="ENUM('dryclean', 'washable')") 
    */
    private $ease_of_care;

    
    /** 
     * @ORM\Column(type="integer", nullable=true) 
    */
    private $discount;

    /** 
     * @ORM\Column(type="string", columnDefinition="ENUM('new', 'review', 'published')") 
    */
    private $status;


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getCost(): ?float
    {
        return $this->cost;
    }

    public function setCost(float $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCategory(): ?ClothCategory
    {
        return $this->category;
    }

    public function setCategory(?ClothCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getManager(): ?User
    {
        return $this->manager;
    }

    public function setManager(?User $manager): self
    {
        $this->manager = $manager;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

   

    public function getSection(): ?string
    {
        return $this->section;
    }

    public function setSection(string $section): self
    {
        $this->section = $section;

        return $this;
    }
    // public function __toString(){
    //   return (string)$this->category_name;
    // }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    

   
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    // public function getClothType(): ?string
    // {
    //     return $this->cloth_type;
    // }

    // public function setClothType(string $cloth_type): self
    // {
    //     $this->cloth_type = $cloth_type;

    //     return $this;
    // }

    
    public function getGoodFit(): ?string
    {
        return $this->good_fit;
    }

    public function setGoodFit(string $good_fit): self
    {
        $this->good_fit = $good_fit;

        return $this;
    }

    public function getAttractiveness(): ?string
    {
        return $this->attractiveness;
    }

    public function setAttractiveness(string $attractiveness): self
    {
        $this->attractiveness = $attractiveness;

        return $this;
    }

    public function getPattern(): ?string
    {
        return $this->pattern;
    }

    public function setPattern(string $pattern): self
    {
        $this->pattern = $pattern;

        return $this;
    }

    public function getLength(): ?string
    {
        return $this->length;
    }

    public function setLength(string $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getNeck(): ?string
    {
        return $this->neck;
    }

    public function setNeck(string $neck): self
    {
        $this->neck = $neck;

        return $this;
    }

    public function getOccasion(): ?string
    {
        return $this->occasion;
    }

    public function setOccasion(string $occasion): self
    {
        $this->occasion = $occasion;

        return $this;
    }

    public function getSleeve(): ?string
    {
        return $this->sleeve;
    }

    public function setSleeve(string $sleeve): self
    {
        $this->sleeve = $sleeve;

        return $this;
    }

    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    public function setOrigin(string $origin): self
    {
        $this->origin = $origin;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getEaseOfCare(): ?string
    {
        return $this->ease_of_care;
    }

    public function setEaseOfCare(string $ease_of_care): self
    {
        $this->ease_of_care = $ease_of_care;

        return $this;
    }

    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    public function setDiscount(?int $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getQuality(): ?string
    {
        return $this->quality;
    }

    public function setQuality(string $quality): self
    {
        $this->quality = $quality;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getClothType(): ?string
    {
        return $this->cloth_type;
    }

    public function setClothType(string $cloth_type): self
    {
        $this->cloth_type = $cloth_type;

        return $this;
    }

    public function toArray()           
        {
            return [
               

                'id'  => $this->getId(),
                'brand'  => $this->getBrand(),
                'color'  => $this->getColor(),
                'cost'  => $this->getCost(),
                'image'  => $this->getImage(),
                'created_at'  => $this->getCreatedAt(),
                'updated_at'  => $this->getUpdatedAt(),
                'section'  => $this->getSection(),
                'size'  => $this->getSize(),
                'name'  => $this->getName(),
                'description'  => $this->getDescription(),
                'quality'  => $this->getQuality(),
                'good_fit'  => $this->getGoodFit(),
                'attractiveness'  => $this->getAttractiveness(),
                'pattern'  => $this->getPattern(),
                'length'  => $this->getLength(),
                'neck'  => $this->getNeck(),
                'occasion'  => $this->getOccasion(),
                'sleeve'  => $this->getSleeve(),
                'origin'  => $this->getOrigin(),
                'ease_of_care'  => $this->getEaseOfCare(),
                'discount'  => $this->getDiscount(),
                'status'  => $this->getStatus(),
                'cloth_type'  => $this->getClothType(),
                    ];
            }

}