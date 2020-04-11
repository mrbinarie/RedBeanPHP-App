<?php if(!defined("HAS_ACCESS")) die("Not Access!"); ?>

<div class="container py-2 text-center">
    Product
</div>

<div class="container card" style="padding: 5px" >
    <div class="row">
        <div class="col-md">
            <img src="https://miro.medium.com/max/2834/0*f81bU2qWpP51WWWC.jpg" class="w-100" />
        </div>
        <div class="col-md-8">
            <div id="name"></div>
            <div id="price"></div>
            <div id="description"></div>
        </div>
    </div>
</div>


<script src="<?= SERVER_URL ?>modules/product.module.js"></script>
<script>
    let product = new Product('<?= $_GET['prod'] ?>');
</script>