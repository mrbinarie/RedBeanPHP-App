<div class="container py-5 text-center">
    product list
</div>

<div class="container" >
    <div class="w-100 text-right">
        <button class="btn btn-success" id="add_product">Add Product</button>

    </div>
 
    <table id="table_products" class="table table-stripped table-sm">
        <thead>
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Price</th>
                <th width="60%">Description</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>



<script src="<?= SERVER_URL ?>modules/products.module.js"></script>
<script>
    let products = new Products();
</script>