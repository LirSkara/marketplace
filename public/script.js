menu.onclick = function() {
    detailed_close.click()
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

catalog.onclick = function() {
    menu.click()
}

search.oninput = function() {
    let poisk = document.getElementById('search').value
    if (poisk != '') {
        itemclose.classList.remove('bi-search')
        itemclose.classList.add('bi-x-lg')
    } else {
        itemclose.classList.remove('bi-x-lg')
        itemclose.classList.add('bi-search')
    }
}

close_custom.onclick = function() {
    let poisk = document.getElementById('search').value = ''
    itemclose.classList.remove('bi-x-lg')
    itemclose.classList.add('bi-search')
}

two.onclick = function() {
    let rows = document.getElementById('rows')
    rows.classList.remove('row-cols-1')
    rows.classList.add('row-cols-2')
    itemone.classList.remove('text-darksuccess')
    itemone.classList.add('text-muted')
    itemtwo.classList.remove('text-muted')
    itemtwo.classList.add('text-darksuccess')
    document.getElementById('two').id = 'one'
}
one.onclick = function() {
    let rows = document.getElementById('rows')
    rows.classList.remove('row-cols-2')
    rows.classList.add('row-cols-1')
    itemtwo.classList.remove('text-darksuccess')
    itemtwo.classList.add('text-muted')
    itemone.classList.remove('text-muted')
    itemone.classList.add('text-darksuccess')
    document.getElementById('one').id = 'two'
}

sort.onclick = function() {
    let down = document.getElementById('down')
    if (down.className == 'bi bi-caret-down-fill down-custom')
        down.classList.add('down-animation')
    else {
        down.classList.remove('down-animation')
    }
}