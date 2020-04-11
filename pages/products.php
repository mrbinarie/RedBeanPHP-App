<?php if(!defined("HAS_ACCESS")) die("Not Access!"); ?>

<div class="container py-2 text-center">
    Products
</div>

<div class="container" >
    <div class="w-100 text-right py-2">
        <button class="btn btn-success" id="add_product">
            <i class="far fa-fw fa-plus-square"></i>
            Add Product
        </button>
        <button class="btn btn-primary" id="cart">
            <i class="fas fa-fw fa-shopping-cart"></i>
            Cart <span id="cart_count"></span>
        </button>
    </div>
 
    <div class="row" id="table_products"></div>
</div>


<script src="<?= SERVER_URL ?>modules/products.module.js"></script>
<script>
    let products = new Products();
</script>