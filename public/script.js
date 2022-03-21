function menu(name) {
    let men = document.getElementById('men')
    let modal = document.getElementById('exampleModalmenu')
    if (modal.hasAttribute('style')) {
        if (getComputedStyle(modal).display == 'block') {
            men.classList.remove('bi')
            men.classList.remove('bi-x-lg')
            men.classList.add('fa')
            men.classList.add('fa-bars')
            catalog.classList.remove('text-darksuccess')
            catalog.classList.add('text-muted')
        } else
        if (getComputedStyle(modal).display == 'none') {
            men.classList.remove('fa')
            men.classList.remove('fa-bars')
            men.classList.add('bi')
            men.classList.add('bi-x-lg')
            catalog.classList.remove('text-muted')
            catalog.classList.add('text-darksuccess')
        }
    } else {
        men.classList.remove('fa')
        men.classList.remove('fa-bars')
        men.classList.add('bi')
        men.classList.add('bi-x-lg')
        catalog.classList.remove('text-muted')
        catalog.classList.add('text-darksuccess')
        home.classList.remove('text-darksuccess')
        home.classList.add('text-muted')
        sign_in.classList.remove('text-darksuccess')
        sign_in.classList.add('text-muted')
        heart.classList.remove('text-darksuccess')
        heart.classList.add('text-muted')
        cart.classList.remove('text-darksuccess')
        cart.classList.add('text-muted')
    }
}

function catalog(name) {

    document.getElementById('menu').click()
}

function search(name) {
    let poisk = document.getElementById(name).value
    if (poisk != '') {
        itemclose.classList.remove('bi-search')
        itemclose.classList.add('bi-x-lg')
    } else {
        itemclose.classList.remove('bi-x-lg')
        itemclose.classList.add('bi-search')
    }
}

function close_custom(name) {
    let poisk = document.getElementById('search').value = ''
    itemclose.classList.remove('bi-x-lg')
    itemclose.classList.add('bi-search')
}

function two(name) {
    let rows = document.getElementById('rows')
    rows.classList.remove('row-cols-1')
    rows.classList.add('row-cols-2')
    itemone.classList.remove('text-darksuccess')
    itemone.classList.add('text-muted')
    itemtwo.classList.remove('text-muted')
    itemtwo.classList.add('text-darksuccess')
    document.getElementById(name).id = 'one'
}
function one(name) {
    let rows = document.getElementById('rows')
    rows.classList.remove('row-cols-2')
    rows.classList.add('row-cols-1')
    itemtwo.classList.remove('text-darksuccess')
    itemtwo.classList.add('text-muted')
    itemone.classList.remove('text-muted')
    itemone.classList.add('text-darksuccess')
    document.getElementById(name).id = 'two'
}

function sort(name) {
    let down = document.getElementById('down')
    if (down.className == 'bi bi-caret-down-fill down-custom')
        down.classList.add('down-animation')
    else {
        down.classList.remove('down-animation')
    }
}

function s_line(name) {
    let poisk = document.getElementById(name).value
    if(poisk != ''){
        $.ajax({    
            type: "GET",
            url: `/search/${poisk}`,
            method: 'get',
            dataType: 'html',
            success: function(data) {
                document.getElementById('search_area').innerHTML = data
            }
        })
    }
}