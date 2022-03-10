//Добавление и удаление из избранного
function give(val) {
    $.ajax({
        url: `/add_favourite/${val}`,
        method: 'get',
        dataType: 'html',
        success: function(data){
            if(data == 1){
                var hearth = document.getElementById(val).innerHTML
                var no = '<i class="bi bi-heart text-danger fs-5"></i>'
                var fill = '<i class="bi bi-heart-fill text-danger fs-5"></i>'
                if(hearth == no){
                    document.getElementById(val).innerHTML = fill
                }
            } else {
                var hearth = document.getElementById(val).innerHTML
                var no = '<i class="bi bi-heart text-danger fs-5"></i>'
                var fill = '<i class="bi bi-heart-fill text-danger fs-5"></i>'
                if(hearth == fill){
                    document.getElementById(val).innerHTML = no
                }
            }
        }
    });
}