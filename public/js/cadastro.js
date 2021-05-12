$(document).ready(function(){

    $("#cep").mask("99.999-999", { reverse: true });
    $("#tel_resid").mask("99999-9999", { reverse: true });
    $("#tel_cel").mask("99999-9999", { reverse: true });
    $("#cpf").mask("999.999.999-99", { reverse: true });

    $("#cep").change(function () {        
        if ($(this).val().length == 10) {
            var cep = $(this).val();
            cep = cep.replace(".", "");
            cep = cep.replace("-", "");

            $.ajax({
                type: "GET",
                url: "https://viacep.com.br/ws/" + cep + "/json/",
                success: function (endereco) {
                    $(".icon-load-cep").hide();

                    if (endereco.erro) {
                        alert("Endereço não encontrado");
                        $("#rua").val("");
                        $("#bairro").val("");
                        $("#cidade").val("");
                        $("#estado").val("");
                    } else {
                        $("#rua").val(endereco.logradouro);
                        $("#bairro").val(endereco.bairro);
                        $("#cidade").val(endereco.localidade);
                        $("#uf").val(endereco.uf);
                    }
                },
                beforeSend: function () {
                    $(".icon-load-cep").show();
                },
                error: function (jq, status, message) {
                    console.log("Status: " + status + " - Message: " + message);
                },
            });
        }
    });
    
});