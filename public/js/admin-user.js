function deleteUser(id, name){
    Swal.fire({
        title: `Are you sure to delete ${name} from users table?` ,
        text: 'Deleted data cannot be restored' ,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $(`#form-delete-${id}`).submit()
        }
    });
}