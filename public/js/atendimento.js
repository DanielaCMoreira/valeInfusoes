function carregarCampos(campo) {
    $.ajax({
        type: "POST",
        url: $("#rotaCarregarCampo").val(),
        data: { 
            campo: campo,
            local: $("#endereco").val(),
            medico: $("#medico").val(),
            especialidade: $("#especialidade").val()
         },
        success: function (data) {
            $("#endereco").val(data['id']);
            $("#medico").val(data['medico_id']);
            $("#especialidade").val(data['especialidade_id']);
        }
    });
}

$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    })
})