<?php if(!defined("HAS_ACCESS")) die("Not Access!");

class AjaxController
{
    public function __construct()
    {
        R::setup('sqlite:database.sqlite');
    }

    public function getProducts()
    {
        $products = R::getAll('SELECT * FROM product');
        $this->parseJSON($products);
    }

    public function getProduct()
    {
        $product_id = intVal($_GET['product_id']);
        $product = R::load('product', $product_id);
        $this->parseJSON($product);
    }
    
    public function addProduct()
    {
        if(isset($_POST) && !empty($_POST))
        {
            $product = R::dispense('product');
            $product->name         = $_POST['name'];
            $product->description  = $_POST['description'];
            $product->price        = $_POST['price'];

            $id = R::store($product);

            $this->parseJSON($id);
        }
    }
    
    public function addToCart()
    {
        if(isset($_POST) && !empty($_POST))
        {
            $cart = R::dispense('cart');
            $cart->product_id = $_POST['product_id'];
            R::store($cart);
        }
        $count = R::count('cart');
        $this->parseJSON($count);
    }
    
    public function getCartProducts()
    {
        $cart = R::getAll("SELECT p.id, p.name, p.price FROM cart as c LEFT JOIN product as p ON c.product_id = p.id");
        
        $this->parseJSON($cart);
    }

    public function parseJSON($response)
    {
        echo json_encode($response);
    }
}