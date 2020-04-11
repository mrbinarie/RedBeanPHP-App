<?php if(!defined("HAS_ACCESS")) die("Not Access!");

class AjaxController
{
    public function getProducts()
    {
        $products = R::getAll('SELECT * FROM products');
        $this->parseJSON($products);
    }

    public function addProduct()
    {
        if(isset($_POST) && !empty($_POST))
        {
            $post = $_POST;
            
            $products = R::dispense('products');
            $products->name         = $post['name'];
            $products->description  = $post['description'];
            $products->price        = $post['price'];
            
            $id = R::store($products);

            $this->parseJSON($id);
        }
    }

    public function parseJSON($response)
    {
        echo json_encode($response);
    }
}