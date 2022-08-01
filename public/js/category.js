// function link(data, subject = 'Guitar'){
//     var html = ''
//     data.forEach(function(value){
//         html += `<li class="text-capitalize">
//                     <a class="filter text-gold" href="${base_url}/browse-brand?subject=${subject}&brd=${value}"><span class="text-country">${value}</span></a>
//                 </li>`
//     })

//     return html
// }

// function categoryLink(data){
//     var html = ''
//     data.forEach(function(value){
//         html += `<li class="text-capitalize">
//                     <a class="filter text-gold" href="${base_url}/browse-category?subject=${value}><span class="text-country">${value}</span></a>
//                 </li>`
//     })
// }

// function setBrand(category){
//     switch(category) {
//         case "Electric Guitars":
//             html = link()
//             break;
//         case "Acoustic Guitars":
//             html = link(['Guild','Martin','Taylor','Epiphone','Kitharra'])
//             break;
//         case "Vintage Stuff":
//             html = link(['Gibson','Fender','Rickenbacker','Gretsch','Danelectro','Epiphone','Supro', 'VOX', 'Marshall', 'Other'])
//             break;
//         case "Ibanez":
//             html = japan
//             break;
//         case "Gretsch":
//             html = japan + korea + indonesia
//             break;
//         case "Kitharra":
//             html = indonesia
//             break;
//         case "ESP":
//             html = usa + japan
//             break;
//         case "Epiphone":
//             html = indonesia
//             break;
//         default:
//     }

//     $('.list-brand').html(html)
// }