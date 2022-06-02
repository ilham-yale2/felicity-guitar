var submitButton = $('.total_action button')
var dirty = $('#dirty')

function numberFormat(number){
	
    var	number_string = number.toString(),
        sisa 	= number_string.length % 3,
        result 	= number_string.substr(0, sisa),
        ribuan 	= number_string.substr(sisa).match(/\d{3}/g)
            
    if (ribuan) {
        separator = sisa ? '.' : ''
        result += separator + ribuan.join('.')
    }

    // console.log(result);
    return result 
}



function deleteItem(product, index){
    Swal.fire({
        title: `Are you sure to delete this Item?`,
        text: 'Deleted item cannot be restored' ,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `${base_url}/cart`,
                method: "POST",
                data: {
                    product: product,
                    _token: token,
                    _method: 'DELETE'
                },
                success: function (res) {
                    Swal.fire({
                        icon: res.status,
                        title: res.title,
                        text: res.text,
                    })
                    if(res.status == 'success'){
                        // update display total price and qty total
                        getTotal(index, false)
                        // remove item in display
                        $(`#product-${index}`).remove()
                    }
                },
            });
        }
    });
    
}

function getTotal(id, sts = true){
    var qtyy = $(`#qq-${id}`).val()
    var price = $(`#pp-${id}`).val()
    var input = $(`#cart_item_${id}`)
    if(sts == true){
        if(input.is(':checked')){
            total = total + parseInt(price)
            qty = qty + parseInt(qtyy)
        }else{
            total = total - parseInt(price)
            qty = qty - parseInt(qtyy)
        }
    }else{
        total = total - parseInt(price)  
        qty = qty - parseInt(qtyy)  
    }
    if(total < 0){
        total = 0
    }
    if(qty < 0){
        qty = 0
    }
    $('.total_qty').html(qty) 
    $('.total_nominal').html('Rp ' + numberFormat(total))

    if(qty > 0 && total > 0){
       submitButton.prop('disabled', false)
    }else{
       submitButton.prop('disabled', true)
    }
}
