class Product
{
    constructor(product_id)
    {
        this.getProduct(product_id);
    }

    getProduct(product_id)
    {
        let _this = this;

        $.ajax({
            url: _url + 'ajax/getproduct',
            type: 'GET',
            data: {product_id: product_id},
            dataType: 'JSON',
            success: function (data) {
                $.each(data, function(key, value) {
                    $('#'+key).text(key + ': ' + value);
                });
            }
        });
    }

}