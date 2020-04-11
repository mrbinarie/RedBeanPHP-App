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
                _this.fillTable(data);
            }
        });
    }

    fillTable(data)
    {
        let table = $('#table_products > tbody');

        $.each(data, function(key, value) {
            table.append(`
                <tr>
                    <td>${value['name']}</td>
                    <td>${value['price']} ₾</td>
                    <td>${value['description']}</td>
                </tr>`);
        });
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
        let data = {};
        
        form.submit(function(e) {
            console.log('aaa')
            e.preventDefault();
            
            $.each(form.serializeArray(), function(key, input) {
                data[ input.name ] = input.value;
            })

            _this.addProduct(data);
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