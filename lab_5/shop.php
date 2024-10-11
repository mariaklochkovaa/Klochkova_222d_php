<?php
class Product
{
    public $name;
    protected $price;
    public $description;
    public function __construct($name, $price, $description){
        if ($price < 0){
            throw new Exception("Price cannot be less than 0");
        }
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    public function getInfo(){
        echo "Назва: " . $this->name . "<br>" .
               "Ціна: " . $this->price . "<br>" .
               "Опис: " . $this->description . "<br>";
    }
}

class DiscountedProduct extends Product{
    public $discount;
    public function __construct($name, $price, $description, $discount){
        parent::__construct($name, $price, $description);
        $this->discount = $discount;
    }
    public function calculateNewPrice() {
        return ($this->price * (100-$this->discount))/100;
    }

    public function getInfo()
    {
        $newPrice = $this->calculateNewPrice();
        echo "Назва: " . $this->name . "<br>" .
            "Знижка:" . $this->discount. "<br>" .
            "Ціна зі знижкою: " . $newPrice . "<br>" .
            "Опис: " . $this->description . "<br>";
    }
}

class Category{
    public $categoryName;
    public $products = [];
    public function __construct($categoryName) {
        $this->categoryName = $categoryName;
    }

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function showProducts(){
        echo "Категорія: " . $this->categoryName . "<br>";
        foreach ($this->products as $product) {
            $product->getInfo();
            echo "<br>";
        }
    }

}