<?
class Product {
    private  $id;
    private  $name;
    private  $category_id;
    private  $price;
    private  $image;

    private   $description;

    public function __construct( $id,  $name,  $category_id,  $price,  $image,   $description) {
        $this->id = $id;
        $this->name = $name;
        $this->category_id = $category_id;
        $this->price = $price;
        $this->image = $image;
        $this->description=$description;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getCategoryId(): int {
        return $this->category_id;
    }

    public function setCategoryId(int $category_id): void {
        $this->category_id = $category_id;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function setPrice(float $price): void {
        $this->price = $price;
    }

    public function getImage(): ?string {
        return $this->image;
    }

    public function setImage(?string $image): void {
        $this->image = $image;
    }

    public function getDescription(): string {
    return $this->description;
}

    public function setDescription(string $description): void {
    $this->description=$description;
}
}