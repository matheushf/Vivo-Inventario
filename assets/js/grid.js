/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

    $("#btn-novo").on("click", function () {
        window.location.assign("form.php?operacao=inserir");
    })

    $("#btn-editar").on("click", function () {
        // TODO implementar editar pegando id
        if (!(id = PegarId())) {
            return false;
        }

        window.location.assign("form.php?operacao=atualizar&id=" + id);
    })

    $("#btn-excluir").on("click", function () {
        if (!(id = PegarId())) {
            return false;
        }

        var modulo = $("#modulo").val();

        if (!confirm("Tem certeza que deseja excluir? ")) {
            alert('n');
            return;
        }

        $.ajax({
            type: 'POST',
            url: '/vivo-inventario/lib/action.php',
            data: {
                acao: 'excluir',
                id: id,
                modulo: modulo
            },
            success: function (data) {
                $("input:checked").parents().find("tr:eq(0)").remove();
            }
        })
    })

    // Marcar linha clicada na grid
    var selecionado = null;

    $("input:checkbox").on("click", function () {
        selecionado = true;
    })

    $("tr").on("click", function () {

        var checkbox = $(this).find(':checkbox');

        if (selecionado) {
            selecionado = false;
            return;
        }

        if (!checkbox.is(':checked')) {
            checkbox.prop("checked", true);
        } else {
            checkbox.prop("checked", false);
        }
    });
})

function PegarId() {
    if ($("input:checked").length == 0) {
        alert("Escolha pelo menos um registro.");
        return false;
    }

    if ($("input:checked").length >= 2) {
        alert('Selecione apenas um registro.');
        return;
    }

    var id = $("input:checked").val();

    return id;
}