<?php if(!defined("HAS_ACCESS")) die("Not Access!");

class AjaxController
{
    public function __construct()
    {
        R::setup('sqlite:database.sqlite');
    }

    public function getProducts()
    {
        $products = R::getAll('SELECT * FROM products');
        $this->parseJSON($products);
    }

    public function addProduct()
    {
        if(isset($_POST) && !empty($_POST))
        {
            $product = R::dispense('products');
            $product->name         = $_POST['name'];
            $product->description  = $_POST['description'];
            $product->price        = $_POST['price'];

            $id = R::store($product);

            $this->parseJSON($id);
        }
    }

    public function parseJSON($response)
    {
        echo json_encode($response);
    }
}