$('.brand-list li').click(function() {
    if ($(this).find('.child').css('display') == 'none') {
        $(this).find('.child').slideDown();
        $(".brand-list li").not(this).find('.child').slideUp();
        $(this).find('.arr').addClass('rotate')
        $(".brand-list li").not(this).find('.arr').removeClass('rotate');
        $(this).find('.main').addClass('text-orange')
        $(".brand-list li").not(this).find('.main').removeClass('text-orange');
    } else {
        $(this).find('.iconify').removeClass('rotate')
        $(this).find('.main').removeClass('text-orange')
    }
    $('.parent').click(function() {
        $('.child').slideUp()
    })
});
function redirect(url){
    window.location.href=url
}

function country(value,name){
    var html = 
    `
    <li class="text-capitalize">
        <a class="filter text-gold" href="${base_url}/browse-brand?brd=${brand}&country=${value}"><span class="text-country">${brand}</span> ${name}</a>
    </li>

    `
    return html

}


function changeBrand(id,name, img){
    $('#brandImg').attr('src', `${base_url}/storage/${img}`)

    $('.child li').removeClass('text-orange')
    $(`.list-${id}`).addClass('text-orange')
    $('.text-country').text(`${name}`)
    setCountry(name)
    $('.filter').each(function(index){
        var url = $(this).attr('href').replace(brand, name)
        $(this).attr('href', url)
    })

    brand = name
}

function setCountry(brand){
    var html;
    var custom = country(1,'Custom')
    var memphis = country(2, 'Memphis')
    var montana = country(3, 'Montana')
    var usa = country(4, 'U.S.A')
    var mexico = country(5, 'Mexico')
    var china = country(6,'China')
    var historic = country(7, 'Custom Historic')
    var japan = country(8, 'Japan')
    var korea = country(9, 'Korea')
    var indonesia = country(10, 'Indonesia')
    var asia = country(11, 'Asia')
    var uk = country(12, 'U.K.')
    var denmark = country(13, 'Denmark')
    switch(brand) {
        case "Fender":
            html = usa + mexico +  custom + country(8, 'Japan/Asia') + country('1', 'CS')
            break;
        case "Rickenbacker":
            html = usa
            break;
        case "Gibson":
            html = custom + historic + memphis + montana
            break;
        case "Ibanez":
            html = japan
            break;
        case "Gretsch":
            html = usa + asia
            break;
        case "Kitharra":
            html = indonesia
            break;
        case "ESP":
            html = usa + asia
            break;
        case "Epiphone":
            html = usa + asia
            break;
        case "PRS":
            html = usa + asia
            break;
        case 'Positive Grid':
            html = usa
            break;
        case "Vox" :
            html = uk
            break;
        case "Peavy" :
            html = usa
            break;
        case "Orange": 
            html = uk
            break;
        case "Marshall":
            html = uk
            break;
        case "Big Muff":
            html = usa
            break;
        case "BOSS":
            html = japan
            break;
        case "EarthQuaker Devices":
            html = usa
            break;
        case "Electro-Harmonix":
            html = usa
            break;
        case "Jim Dunlop":
            html = usa
            break;
        case "MXR":
            html = usa
            break;
        case "Stymon":
            html = usa
            break;
        case "TC Electronic":
            html = denmark
            break;
        case "Wampler":
            html = usa
            break;
        case "Waza Craft":
            html = usa
            break;
        default:
    }

    $('#country').html(html)
}   