var shipping_address = $('input[name="shipping_address"]')
        var shipping_city = $('input[name="shipping_city"]')
        var shipping_province = $('input[name="shipping_province"]')
        var shipping_country = $('input[name="shipping_country"]')
        var shipping_sub_distric = $('input[name="shipping_sub_distric"]')
        var shipping_postcode = $('input[name="shipping_postcode"]')
        var inputAddress =  $('.input-address')
        var formAddress =  $('#form-address')
        var addressSelect = $('#addressSelect')
        function showForm(){

            formAddress.toggleClass('d-block')
            addressSelect.toggleClass('d-block')
            if($('#different').prop('checked') === false){
                inputAddress.removeProp('value').prop('required', false)
            }else{

                inputAddress.prop('required', true)
            }
            
        }

        addressSelect.change(function(){
            $.ajax({
                url: `${base_url}/get-address`,
                method: "POST",
                data: {
                    _token: token,
                    address: addressSelect.val() 
                },
                success: function(res){
                    shipping_address.val(res.street_address)
                    shipping_city.val(res.city)
                    shipping_province.val(res.province)
                    shipping_country.val(res.country)
                    shipping_postcode.val(res.postcode)
                    shipping_sub_distric.val(res.sub_distric)
                }
            })
        })