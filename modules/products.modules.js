class Products
{
    constructor()
    {
        this.getProducts();
    }

    getProducts()
    {
        let _this = this;

        $.ajax({
            url: _url + 'ajax/getproducts',
            type: 'POST',
            dataType: 'JSON',
            success: function (data) {
                console.log(data)
            }
        });
    }

    addProduct(data)
    {
        let _this = this;
        
        $.ajax({
            url: _url + 'ajax/addproduct',
            type: 'POST',
            data: data,
            dataType: 'JSON',
            success: function (data) {
                console.log(data)
            }
        });

    }

}