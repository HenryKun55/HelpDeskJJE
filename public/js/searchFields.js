//Cliente
//Métodos para aparecer e desaparecer o tipo de pesquisa
$('#searchClient, #btn-group').focusin( function() {
    $('#btn-group').css('display', 'block');
});
  
$('div.row').mouseleave( function() {
     $('#btn-group').css('display', 'none');
});
    
$('#searchClient').on('keyup',function(){
    
    $fantasy = $('input:radio[name=display]:checked').val();

    $value=$(this).val();
    $.ajax({
        type : 'get',
        url : '/clientes/search',
        data:{'search':$value, 'path':'/clientes', 'tipo':$fantasy},
        success:function(data){
            $('tbody').html(data);
                if($value){
                    $('ul.pagination').hide();
                }else{
                    $('ul.pagination').show();
            }   
        }
    });
})

//Pesquisa CRM

$('#searchCRM').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
        type : 'get',
        url : '/crm/search',
        data:{'search':$value, 'path':'/crm'},
        success:function(data){
            $('tbody').html(data);
                if($value){
                    $('ul.pagination').hide();
                }else{
                    $('ul.pagination').show();
            }   
        }
    });
})

//Pesuisa Base de Conhecimento

$('#searchKnowLedgeBase').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
        type : 'get',
        url : '/base-de-conhecimento/search',
        data:{'search':$value, 'path':'base-de-conhecimento'},
        success:function(data){
            $('tbody').html(data);
                if($value){
                    $('ul.pagination').hide();
                }else{
                    $('ul.pagination').show();
            }   
        }
    });
})

//Pesquisa de Chamado

$('#searchSolicitation, #btn-group').focusin( function() {
    $('#btn-group').css('display', 'block');
});
  
$('div.row').mouseleave( function() {
     $('#btn-group').css('display', 'none');
});

$('#searchSolicitation').on('keyup',function(){

    $fantasy = $('input:radio[name=display]:checked').val();
    
    $value=$(this).val();
    $.ajax({
        type : 'get',
        url : '/chamados/search',
        data:{'search':$value, 'path':'chamados', 'tipo':$fantasy},
        success:function(data){
            $('tbody').html(data);
                if($value){
                    $('ul.pagination').hide();
                }else{
                    $('ul.pagination').show();
            }    
        }
    });
})

//Pesquisa de Usuáro

$('#searchUser').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
        type : 'get',
        url : '/usuario/search',
        data:{'search':$value, 'path':'users'},
        success:function(data){
            $('tbody').html(data);
                if($value){
                    $('ul.pagination').hide();
                }else{
                    $('ul.pagination').show();
            }
        }
    });
})

//Método para organizar os históricos de acordo com os cliques no + e -

    $('a#cc').click(function(){ 

        if($('ul').hasClass('collapse in')){
            $('p#cc').show();
         }else{
            $('p#cc').hide();
         }
    });