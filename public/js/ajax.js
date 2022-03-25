//Добавление и удаление из избранного
function give(val) {
    val = val.replace(/[a-zа-яё]/gi, '')
    $.ajax({
        url: `/add_favourite/${val}`,
        method: 'get',
        dataType: 'html',
        success: function(data){
            if(data == 1){
                var hearth = document.getElementById('f'+val).innerHTML
                var no = '<i class="bi bi-heart text-danger fs-5"></i>'
                var fill = '<i class="bi bi-heart-fill text-danger fs-5"></i>'
                if(hearth == no){
                    document.getElementById('f'+val).innerHTML = fill
                }
            } else {
                var hearth = document.getElementById('f'+val).innerHTML
                var no = '<i class="bi bi-heart text-danger fs-5"></i>'
                var fill = '<i class="bi bi-heart-fill text-danger fs-5"></i>'
                if(hearth == fill){
                    document.getElementById('f'+val).innerHTML = no
                }
            }
        }
    });
}

// Меняет кнопку на инпут
function cart_swap(id) {
    let swap = document.getElementById(id)
    let input = document.getElementById(`i${id}`)
    let like = document.getElementById(`f${id}`)
    let success = document.getElementById(`c${id}`)
    swap.classList.add('d-none')
    input.classList.remove('d-none')
    input.classList.add('d-inline')
    like.classList.add('d-none')
    success.classList.remove('d-none')
}

//Добавление и удаление товаров в корзине
function give_cart(val) {
    val = val.replace(/[a-zа-яё]/gi, '')
    var col = document.getElementById(`i${val}`).value
    col = col.replace(/[a-zа-яё]/gi, '')
    $.ajax({
        url: `/add_to_cart/${val}/${col}`,
        method: 'get',
        dataType: 'html',
        success: function(data){
            if(data == 1){
                var input = document.getElementById(`i${val}`)
                input.classList.add('d-none')
                document.getElementById('c'+val).innerHTML = 'Добавлен'
                document.getElementById('c'+val).disabled = true
            } else {
                var input = document.getElementById(`i${val}`)
                input.classList.add('d-none')
                document.getElementById('c'+val).innerHTML = 'Ошибка'
            }
        }
    });
}