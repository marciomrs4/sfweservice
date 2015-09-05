var $alert = jQuery.noConflict();

$alert(document).on('click','#login',function(event){

    event.preventDefault();



    var dados = $alert('#loginform').serialize();

    //alert(dados);

    $alert.ajax({
        url: '/app.php/userweb/dologin',
        method: 'POST',
        data: dados,
        dataType: 'json',

        beforeSend: function()
        {
            $alert(".btn-primary").hide();
        },

        complete: function()
        {
            $alert(".btn-primary").show();
        },

        success: function(datas)
        {
            var novo = [];

            novo += '<table class="table table-bordered">' +
            '<th>Nome</th>' +
            '<th>Senha</th>' +
            '<th>Token</th>' +
            '<th>Data Experies</th>' +
            '<th>Errors</th>';

            $alert.each(datas,function(i, data){

                novo += '<tr>' +
                '<td>' + data.nome + '</td>' +
                '<td>' + data.senha + '</td>' +
                '<td>' + data.wetoken +'</td>' +
                '<td>' + data.dataExperies +'</td>' +
                '<td>' + data.geterror +'</td>' +
                '</tr>';

            });
            novo += '</table>';

            $alert('#loadlogin').html(novo);

            //console.log(data);

        },

        error: function(){
            alert("Houve um erro na Requisicao");
        }
    });

});