<?php if(!defined("HAS_ACCESS")) die("Not Access!"); ?>

<div class="container py-2 text-center">
    Products
</div>

<div class="container" >
    <div class="w-100 text-right py-2">
        <button class="btn btn-success" id="add_product">Add Product</button>

    </div>
 
    <div class="row" id="table_products"></div>
</div>


<script src="<?= SERVER_URL ?>modules/products.module.js"></script>
<script>
    let products = new Products();
</script>