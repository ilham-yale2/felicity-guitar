var count = 0;

function getSub() {
    var id = $("#category_id").val();
    $.ajax({
        url: `${base_url}/sub-category-data/${id}`,
        method: "GET",
        headers: {
            "X-CSRF-TOKEN": token,
        },
        success: function (response) {
            var sub = `<option value="">Pilih Kategori</option>`;
            response.map((value) => {
                sub += `<option value="${value.id}">${value.name}</option>`;
            });

            $("#sub_id").html(sub);
            // $("#subcategory_id").html("");
        },
    });
}

function getCode() {
    $.ajax({
        url: `${base_url}/product/code`,
        method: "GET",
        headers: {
            "X-CSRF-TOKEN": token,
        },
        success: function (response) {
            $("#code").val(response);
            $("#fakecode").val(response);
        },
    });
}

function addProductDetail() {
    var category_id = $("#category_id").val();
    var category_name = $("#category_id").find('option:selected').text();
    var subcategory_id = $("#subcategory_id").val();
    var subcategory_name = $("#subcategory_id").find('option:selected').text();

    if (subcategory_id == "") {
        subcategory_name = "";
    }

    var html = `<tr id="row${count}">
        <td>
            <input type="hidden" name="category_id[]" value="${category_id}">
            ${category_name}
        </td>
        <td>
            <input type="hidden" name="subcategory_id[]" value="${subcategory_id}">
            ${subcategory_name}
        </td>
        <td>
            <button class="btn btn-danger" onclick="$('#row${count}').remove()">-</button>
        </td>
    </tr>`;

    count++;
    $('#data-detail').append(html);
}


function deleteImage(id) {
    Swal.fire({
        title: `Are you sure to delete this image?`,
        text: 'Deleted data cannot be restored' ,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            console.log(id);
            $.ajax({
                url: `${base_url}/product/delete-image`,
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": token,
                },
                data: {
                    id: id,
                },
                success: function (response) {
                    if(response.type == 'success'){
                        Swal.fire({
                            icon: response.type,
                            title: response.title,
                            text: response.text,
                        })
                        $("#image-" + id).remove();
                    }
                },
            });
        }
    });
   
}

function deleteDetail(id, product) {
    $.ajax({
        url: `${base_url}/product/detail/destroy`,
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": token,
        },
        data: {
            id: id,
            product_id: product
        },
        success: function (res) {
            if(res.status == 'success'){
                $(".old-" + id).remove();
            }
        },
    });
}

function replaceDot(input){
    input =  input.replace(/\./g,'')
    return input.replace(/,/g, '')
}


function getSellPrice() {
    var price = replaceDot($('#price').val());
    var disc = $('#disc').val();

    var disc_price = parseFloat(price) * parseFloat(disc) / 100;
    var sell_price = price - disc_price;

    $("#sell_price").val(sell_price);

}

function readURL(input, target) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            target.attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);

    }
}
$('#thumbnail').change(function () {

    readURL(this, $('#preview-photo'))
})
$('#thumbnail-2').change(function () {

    readURL(this, $('#preview-photo2'))
})


$('#myForm').submit(function() {
    if($('#text').summernote('isEmpty')) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Product Text is required',
        })
        return false;
    }
    if ($('#photos').get(0).files.length === 0) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please Insert a photos file',
            })
        return false;
    }else{
        return true
    }
});
$('.year').datepicker({
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years"
});


function addColumn(target){
    var html = '';
    var title = $(`#${target}-title`)
    var value = $(`#${target}-value`)
    if(title.val() == '' || value.val() == ''){
        Swal.fire({
            icon: 'error',
            title: 'Oops..!!',
            text: 'Title and Value is required'
        })
    }else{

        html += `<div class="col-md-4 ${target}-${count}">
                    <div class="form-group mb-2">
                        <input type="text" name="title[]" class="form-control" value="${title.val()}">
                        <input type="hidden" name="type[]" value="${target}" class="form-control " required>
                    </div>
                </div>
                <div class="col-md-7 ${target}-${count}">
                    <div class="form-group mb-2">
                        <input type="text" name="value[]" value="${value.val()}" class="form-control " required>
                    </div>
                </div>
                <div class="${target}-${count}">
                    <button class="btn btn-danger ml-3 py-1 px-2" type="button" onclick="deleteRow('${target}-${count}')">
                     <span class="iconify" data-icon="ic:round-remove"></span>
                    </button>
                </div>`
        $(`#${target}`).append(html)
        value.val('')
        title.val('')
        count++
    }
}

function deleteRow(target){
    $(`.${target}`).remove()
}