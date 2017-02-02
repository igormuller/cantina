$(function (){
    $('#data').mask('00/00/0000');
    
    //Finalização do Pedido
    $('#dinheiro').bind('focusout', function (){
        soma = atualizaSoma();
        soma = soma.toFixed(2).replace('.',',');
        $('#soma').html('<input type="text" class="form-control" value='+soma+' disabled />');
    });
    $('#debito').bind('focusout', function (){
        soma = atualizaSoma();
        soma = soma.toFixed(2).replace('.',',');
        $('#soma').html('<input type="text" class="form-control" value='+soma+' disabled />');
    });
    $('#credito').bind('focusout', function (){
        soma = atualizaSoma();
        soma = soma.toFixed(2).replace('.',',');
        $('#soma').html('<input type="text" class="form-control" value='+soma+' disabled />');
    });
});

function atualizaSoma() {
    var soma = 0;
    soma += Number($('#dinheiro').val().replace(',','.'));
    soma += Number($('#debito').val().replace(',','.'));
    soma += Number($('#credito').val().replace(',','.'));
    return soma;
}