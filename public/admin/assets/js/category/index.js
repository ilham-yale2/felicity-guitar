
function addSub(){
    var input = $(`#input-sub-${count}`)
    if(input.val() == ""){
        alert('input sub category name is required')
    } else{
        count++ 
        const html = `
        <div class="col-md-4 mb-2" id="sub-${count}">
            <div class="list">
                <label for="name">Name</label>
                <div class="d-flex align-items-center">
                    <input type="text" class="form-control " name="name[]" required id="input-sub-${count}" >
                    <div class="">
                        <button type="button" onclick="deleteRow(${count})" class="ml-3 btn btn-danger p-1 ">
                            <span class="iconify" data-icon="ant-design:delete-twotone"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>`
        $(`.list-sub`).append(html)
    }
}
function doDelete(id) {

    Swal.fire({
        title: 'Yakin?',
        text: "Data yang terhapus tidak dapat di restore",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: global_url + '/product/' + id,
                method: 'DELETE',
                data: {
                    _token: token
                },
                dataType: 'json',
                success: function(resp) {
                    window.location.href = global_url + '/product?&del_suc=1';
                }
            });
        }
    });

}

function deleteSub(id) {

    confirm('Are You sure to delete this data?')
    if(window.confirm){
        $.ajax({
            url : `${base_url}/sub-category/${id}`,
            type: 'DELETE',
            dataType: 'JSON',
            data:{
                "_token": token,
            },
            success: function(res){
                if(res.status == 'success'){
                    $(`#sub-${id}`).remove()
                    alert(res.message)
                }
            }
        })
    }

}

function deleteRow(id){
    $(`#sub-${id}`).remove()
}