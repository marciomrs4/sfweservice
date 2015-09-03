    var $alert = jQuery.noConflict();

$alert(document).ready(function(){

    //Fecha o modal do erro padrão do sistema
    $alert('.close').click(function(){
		$alert("#myModal").hide(1000);
	});

    //Encolhe os paineis do sistema de forma padrao
    $alert(document).on('click','.panel-heading',
        function(){
            $alert(this).next().toggle(1000);
            blabla();
        });

    //Encolhe os paineis do sistema de forma padrao
   /* $alert(document).on({
        click: function(){
            $alert('.panel-heading').next().toggle(1000);
        }
    });*/


        $alert('.alert-success').parent().parent().parent().parent().hide(3000);

});


function blabla(){

    $alert('#loadheare').hide(1000);


    $alert.getJSON('/app.php/json',function(datas){

        var novo = [];

        novo += '<table class="table table-bordered">' +
        '<th class="active">Nome</th>' +
        '<th>Idade</th>';

        $alert.each(datas, function(i, data){

            novo += '<tr><td>' + data.nome + '</td><td>' + data.idade + '</td></tr>';

        });
        novo += '</table>';

        $alert('#loadheare').html(novo);
        //console.log(data);


    });

    $alert('#loadheare').show(1000);

}

function alertar(){
    alert('Ahh alerta na coluna');
}

$alert(document).on('click','#cliqueaqui',blabla);


$alert(document).on('click','.table-bordered',blabla);


$alert(document).on('click','.active',alertar);

$alert(document).on('click','#botaoSave',function(event){

    event.preventDefault();

    //alert('Ohh ');

    var dados = $alert('#usuario').serialize();

    $alert.ajax({
        url: '/app.php/receiveform',
        method: 'POST',
        data: dados,
        dataType: 'json',

        beforeSend: function()
        {
            //alert('Teste');
            $alert(".btn-primary").hide();
            //alert('Teste');
        },

        complete: function()
        {
            //alert('Complete');
            $alert(".btn-primary").show();

        },

        success: function(datas)
        {
            //alert('Sucess');
          /*  $alert(".btn-primary").show();
            $alert("#loadheare").html(data);
*/
            var novo = [];

            novo += '<table class="table table-bordered">' +
            '<th class="active">Nome</th>' +
            '<th>Email</th>' +
            '<th>Ramal</th>';

            $alert.each(datas, function(i, data){

                novo += '<tr>' +
                            '<td>' + data.nome + '</td>' +
                            '<td>' + data.email + '</td>' +
                            '<td>' + data.ramal +'</td>' +
                        '</tr>';

            });
            novo += '</table>';

            $alert('#loadheare').html(novo);

            //console.log(data);

        },

        error: function(){
            alert("Houve um erro na Requisicao");
        }
    });

});