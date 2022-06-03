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
    var usa = `<li class="text-capitalize">
                    <a class="filter" href="${base_url}/browse-brand?brd=${brand}&country=U.S.A"><span class="text-country">${brand}</span> U.S.A</a>
                </li>`
    var mexico = `<li class="text-capitalize">
                    <a class="filter" href="${base_url}/browse-brand?brd=${brand}&country=Mexico"><span class="text-country">${brand}</span> Mexico</a>
                </li>`
    var china = `<li class="text-capitalize">
                    <a class="filter" href="${base_url}/browse-brand?brd=${brand}&country=China"><span class="text-country">${brand}</span> China</a>
                </li>`
    var custom = `<li class="text-capitalize">
                    <a class="filter" href="${base_url}/browse-brand?brd=${brand}&country=Custom"><span class="text-country">${brand}</span> Custom</a>
                </li>`
    var historic = `<li class="text-capitalize">
                    <a class="filter" href="${base_url}/browse-brand?brd=${brand}&country=Custom Historic"><span class="text-country">${brand}</span> Custom Historic</a>
                </li>`
    var montana = `<li class="text-capitalize">
                    <a class="filter" href="${base_url}/browse-brand?brd=${brand}&country=Montana"><span class="text-country">${brand}</span> Montana</a>
                </li>`
    var memphis = `<li class="text-capitalize">
                    <a class="filter" href="${base_url}/browse-brand?brd=${brand}&country=Memphis"><span class="text-country">${brand}</span> Memphis</a>
                </li>`
    var japan = `<li class="text-capitalize">
                    <a class="filter" href="${base_url}/browse-brand?brd=${brand}&country=Japan"><span class="text-country">${brand}</span> Japan</a>
                </li>`
    var korea = `<li class="text-capitalize">
                    <a class="filter" href="${base_url}/browse-brand?brd=${brand}&country=Korea"><span class="text-country">${brand}</span> Korea</a>
                </li>`
    var indonesia = `<li class="text-capitalize">
                    <a class="filter" href="${base_url}/browse-brand?brd=${brand}&country=Indonesia"><span class="text-country">${brand}</span> Indonesia</a>
                </li>`
    switch(brand) {
        case "Fender":
            html = usa + mexico + china
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
            html = japan + korea + indonesia
            break;
        case "Kitharra":
            html = indonesia
            break;
        case "ESP":
            html = usa + japan
            break;
        case "Epiphone":
            html = indonesia
            break;
        default:
    }

    $('#country').html(html)
}   