function addToCart(code, type = 'non-private-vault'){
    $.ajax({
        url: `${base_url}/cart`,
        method: "POST",
        data: {
            _token: token,
            code: code,
            type: type,
        },
        success: function(res){
            Swal.fire({
                icon: res.status,
                title: res.title,
                text: res.text
            })
        }
    })
}

function loginMessage(){
    Swal.fire({
        icon: 'error',
        title: 'Oopss...!',
        text: 'You must login First'
    })
}