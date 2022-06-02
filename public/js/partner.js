function readURL(input, target) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            target.attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);

    }
}
$('#image').change(function () {
    

    readURL(this, $('#preview-image'))
})
$('#myForm').submit(function() {
    if($('#description').summernote('isEmpty')) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Partner Description is required',
        })
        return false;
    }
    if($('#number_phone').length > 12){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Phone number cannot be longer than 12 characters',
        })
        return false;
    }
});