var title = $('#title')
var name_address = $('#name_address')
var street_address = $('#street_address')
var sub_distric = $('#sub_distric')
var city = $('#city')
var province = $('#province')
var country = $('#country')
var postcode = $('#postcode')
var formAddress = $('#formAddress')
var addressList = $('#addressList')
var submit_address = $('#submit_address')
function editProfile(){
    $('.profile').attr('disabled', false)
    $('#username').trigger('focus')
    $('#cancel_profile').addClass('d-block');
    $('#submit_profile').addClass('d-block');
    $('#edit_profile').addClass('d-none')
}

function cancelProfile(){
    $('#edit_profile').removeClass('d-none')
    $('.profile').attr('disabled', true)
    $('#submit_profile').removeClass('d-block')
    $('#cancel_profile').removeClass('d-block')
}

function uploadAvatar(){
    
}

formAddress.submit(function(){
    if(1 + 2 == 3){
        formData = new FormData(formAddress[0])
        $.ajax({
            url: formAddress.attr('action'),
            method: formAddress.attr('method'),
            headers: {
                "X-CSRF-TOKEN": token,
            },
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 800000,
            success: function (res) {

                if(res.status == 'success'){
                    Swal.fire({
                        icon: res.status,
                        title: res.title,
                        text: res.text,
                    })
                    var data = res.data.address
                    if(res.type == 'save'){
                        var new_address = `<div class="addresslist_item">
                                            <div class="addresslist_address">
                                                <h5>${data.title}</h5>
                                                <adddatas>${data.name} ${data.street_address}, ${data.sub_distric}, ${data.city}, ${data.province} <br>
                                                    ${data.country}, ${data.postcode}</address>
                                            </div>
                                            <div class="addresslist_edit"><button type="button" class="btn btn-white" onclick="editAddress(${data.id})">Edit</button></div>
                                        </div>`
                
                        addressList.append(new_address)
                    }else{
                        var address = `
                                            <div class="addresslist_address">
                                                <h5>${data.title}</h5>
                                                <adddatas>${data.name} ${data.street_address}, ${data.sub_distric}, ${data.city}, ${data.province} <br>
                                                    ${data.country}, ${data.postcode}</address>
                                            </div>
                                            <div class="addresslist_edit"><button type="button" class="btn btn-white" onclick="editAddress(${data.id})">Edit</button></div>
                                            `
                
                        $(`#address-${data.id}`).html(address)
                        submit_address.text('Add Address')

                    }
                    formAddress.trigger('reset')
                }
            },
        })
    }
    return false;
})
function editAddress(id){
    var url = `${base_url}/address/${id}` 
    formAddress.attr('action', url)

    $.ajax({
        url: `${base_url}/address/${id}`,
        method: "PUT",
        headers: {
            "X-CSRF-TOKEN": token,
        },
        data: {
            id: id,
        },
        success: function (res) {
            title.val(res.title).focus();
            name_address.val(res.name);
            street_address.val(res.street_address);
            sub_distric.val(res.sub_distric);
            city.val(res.city);
            province.val(res.province);
            country.val(res.country);
            postcode.val(res.postcode);
            submit_address.text('Save Address')
        },
    });

}