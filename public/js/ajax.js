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
//Добавление и удаление товаров в корзине
function give_cart(val) {
    val = val.replace(/[a-zа-яё]/gi, '')

    $.ajax({
        url: `/add_to_cart/${val}`,
        method: 'get',
        dataType: 'html',
        success: function(data){
            if(data == 1){
                document.getElementById('c'+val).innerHTML = 'Добавлен'
                document.getElementById('c'+val).disabled = true
            } else {
                document.getElementById('c'+val).innerHTML = 'Ошибка'
            }
        }
    });
}