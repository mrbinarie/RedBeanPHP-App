class Products
{
    constructor()
    {
        let _this = this;

        this.getProducts();

        $('#add_product').on('click', function() {
            _this.modalAddProduct();
        });

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
        
                $.each(data, function(key, value) {
                    _this.appendProduct(value);
                });
            }
        });
    }

    appendProduct(value)
    {
        let table = $('#table_products');

        table.append(`
            <div class="col-md-3" style="padding: 5px">
                <div class="card" style="padding: 5px">
                    <img src="https://miro.medium.com/max/2834/0*f81bU2qWpP51WWWC.jpg" class="w-100" />
                    
                    <div class="row">
                        <div class="col-md"><a href="${_url + 'product?prod=' + value['id']}">${value['name']}</a></div>
                        <div class="col-md text-right text-success">${value['price']} ₾</div>
                        <div class="col-md-12">${value['description']}</div>
                    </div>
                </div>
            </div>`);
    }

    modalAddProduct()
    {
        let modal = $('#product_modal');
        let modalBody = $('div[class="modal-body"]');

        let form = `
            <form id="form_addProduct">
                <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="name">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="description"  cols="30" rows="10" style="resize: none;" placeholder="description"></textarea>
                </div>
                <div class="form-group">
                    <input class="form-control" type="number" name="price" placeholder="price">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
            </form>`;

        modalBody.html(form);
        modal.modal('show');

        this.submitAddProduct();
    }
    
    submitAddProduct()
    {
        let _this = this;
        let form = $('#form_addProduct');
        let modal = $('#product_modal');
        let data = {};
        
        form.submit(function(e) {
            console.log('aaa')
            e.preventDefault();
            
            $.each(form.serializeArray(), function(key, input) {
                data[ input.name ] = input.value;
            })

            _this.addProduct(data);

            modal.modal('hide');
            _this.appendProduct(data);
        });
    }

    addProduct(params)
    {
        let _this = this;
        
        $.ajax({
            url: _url + 'ajax/addproduct',
            type: 'POST',
            data: params,
            dataType: 'JSON',
            success: function (data) {
                console.log(data)
            }
        });

    }

}