function addToCart(code){
    $.ajax({
        url: `${base_url}/cart`,
        method: "POST",
        data: {
            _token: token,
            code: code
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