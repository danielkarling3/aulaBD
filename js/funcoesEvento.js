/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* global FB */
validalogin = function(){   
    FB.getLoginStatus(function (response) {
        if (response.status !== 'connected') {
            alert('Por favor faça seu login!!!');
            window.location = "index.php";        
        } 
    }); 
};


modalAddEvento = function(){
    validalogin();
    $('#tituloModal').html('ADD Evento');
    $('#corpoModal').load('./form/formAddEvento.php');
    $('#botaoSalvar').html('\
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Fechar</button>\n\
        <button type="button" class="btn btn-success" onclick="addEvento();">Salvar</button>\n\
    ');
    $('#modal').modal('show');
    
};
modalAddCartao = function(){
    validalogin();
    $('#tituloModal').html('ADD Cartão');
    $('#corpoModal').load('./form/formAddCartao.php');
    $('#botaoSalvar').html('\
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>\n\
        <button type="button" class="btn btn-success" onclick="addCartao();">Salvar</button>\n\
    ');
    $('#modal').modal('show');
    
};

modalAddCandidato = function(eventoId){
    validalogin();
    $('#tituloModal').html('ADD Candidato');
    $('#corpoModal').load('./form/formAddCandidato.php?eventoId='+eventoId);
    $('#botaoSalvar').html('\
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>\n\
        <button type="button" class="btn btn-success" onclick="addCandidato('+eventoId+');">Salvar</button>\n\
    ');
    $('#modal').modal('show');
    
};

modalEditCandidato = function (candidatoId, eventoId){
    validalogin();
    
    $('#tituloModal').html('Altera Candidato');
    $('#corpoModal').load('./form/formEditCandidato.php?candidatoId='+candidatoId+'&eventoId='+eventoId);
    $('#botaoSalvar').html('\
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>\n\
        <button type="button" class="btn btn-danger" onclick="delCandidato('+candidatoId+','+eventoId+' );">Deleta</button>\n\
        <button type="button" class="btn btn-success" onclick="editCandidato('+candidatoId+','+eventoId+' );">Salvar</button>\n\
    ');
    $('#modal').modal('show');
    
};


editCandidato = function (id, eventoId){
    validalogin();
    $.get("../funcoesBD/update/updateCandidato.php?id="+id+"&nome="+$('#nome').val()+"&local="+$('#local').val()+"&maisInfo="+$('#maisInfo').val()+"&categoriaId="+$('#categoria').val(), function(data){
        if (data != 'ok'){
            alert(data);
        }else{
            $('#modal').modal('hide');  
            $('#divCandidatos').load('candidatosAjax.php?eventoId='+eventoId);
        }
    });
    
};

addEvento = function (){
    validalogin();
    $.get("../funcoesBD/insert/insertEvento.php?nome="+$('#nome').val()+
            "&local="+$('#local').val()+
            "&usuarioId="+sessionStorage.getItem("usuarioId"), 
        function(data){
            if (data != 'ok'){
                alert(data);
            }else{
                $('#modal').modal('hide');
                $('#divEventos').load('eventos.php?id='+sessionStorage.getItem("usuarioId"));
            }
        });
};
addCartao = function (){
    validalogin();
    $.get("../funcoesBD/insert/insertCartao.php?email="+$('#email').val()+"&eventoId="+$('#eventoId').val(), function(data){
        if (data.substring(0, 4) == 'erro'){
            alert(data);
        }else{
            $('#modal').modal('hide');  
            $('#divCartoes').load('cartoes.php?eventoId='+sessionStorage.getItem("eventoId"));
        }
    });
};
addQuesito = function (eventoId){
    validalogin();
    $.get("../funcoesBD/insert/insertQuesito.php?quesito="+$('#quesito').val()+"&min="+$('#min').val()+"&max="+$('#max').val()+"&eventoId="+eventoId, function(data){
        if (data.substring(0, 4) == 'erro'){
            alert(data);
        }else{           
            $('#divQuesitos').load('quesitosAjax.php?eventoId='+eventoId);            
        }
    });
};
addCategoria = function (eventoId){
    validalogin();
    $.get("../funcoesBD/insert/insertCategoria.php?categoria="+$('#categoria').val()+"&eventoId="+eventoId, function(data){
        if (data.substring(0, 4) == 'erro'){
            alert(data);
        }else{    
            $('#divCategorias').load('categoriasAjax.php?eventoId='+eventoId);            
        }
    });
};

addCandidato = function (eventoId){
    validalogin();
    $.get("../funcoesBD/insert/insertCandidato.php?nome="+$('#nome').val()+"&local="+$('#local').val()+"&maisInfo="+$('#maisInfo').val()+"&categoriaId="+$('#categoria').val()+"&eventoId="+eventoId, function(data){
        if (data != 'ok'){
            alert(data);
        }else{
            $('#modal').modal('hide');  
            $('#divCandidatos').load('candidatosAjax.php?eventoId='+eventoId);
        }
    });
};

delCandidato = function (id,eventoId){
    validalogin();
    $.get("../funcoesBD/delete/delCandidato.php?id="+id, function (data){
        if (data.substring(0, 4) == 'erro'){
            alert(data);
        }else{
            $('#modal').modal('hide'); 
            $('#divCandidatos').load('candidatosAjax.php?eventoId='+eventoId);
        }
    });
};


delCartao = function (id){
    validalogin();
    $.get("../funcoesBD/delete/delCartao.php?id="+id, function (data){
        if (data.substring(0, 4) == 'erro'){
            alert(data);
        }else{            
            $('#divCartoes').load('cartoes.php?eventoId='+sessionStorage.getItem("eventoId"));
        }
    });
};


delQuesito = function (id,eventoId){
    validalogin();
    $.get("../funcoesBD/delete/delQuesito.php?id="+id, function (data){
        if (data.substring(0, 4) == 'erro'){
            alert(data);
        }else{            
            $('#divQuesitos').load('quesitosAjax.php?eventoId='+eventoId);
        }
    }); 
};
delCategoria = function (id,eventoId){
    validalogin();
    $.get("../funcoesBD/delete/delCategoria.php?id="+id, function (data){
        if (data.substring(0, 4) == 'erro'){
            alert(data);
        }else{
            $('#divCategorias').load('categoriasAjax.php?eventoId='+eventoId);
        }
    });
};


carregarCartoes = function (cartaoId){
    validalogin();
    $('#divCartoes').load('cartoes.php?eventoId='+sessionStorage.getItem("eventoId")+'&cartaoId='+cartaoId);
    $('#divCandidatos').load('candidatos.php?cartaoId='+cartaoId);
};


selecionaCartao = function (cartaoId){
    validalogin();
    if (cartaoId === 0){ 
        carregarEventos($('#eventoId').val());
    }else{
        $('#divEventos').load('eventos.php?id='+sessionStorage.getItem("usuarioId")+'&eventoId='+$('#eventoId').val());
        $('#divCartoes').load('cartoes.php?id='+sessionStorage.getItem("usuarioId")+
                '&eventoId='+$('#eventoId').val()+'&cartaoId='+cartaoId);
//        var divCaratao = "divCartao_"+cartaoId;
//        $("#"+divCaratao).load('quesitos_candidatos.php?cartaoId='+cartaoId);
    }
    
};

modalVinculaCandidatos = function (cartaoId){
    validalogin();
    $('#tituloModal').html('Vincular Candidatos');
    $('#corpoModal').load('./form/formVinculaCandidatos.php?eventoId='+sessionStorage.getItem("eventoId")+'&cartaoId='+cartaoId);    
    $('#botaoSalvar').html('\
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>\n\
        <button type="button" class="btn btn-success" onclick="vinculaCandidatos('+cartaoId+');">Salvar</button>\n\
    ');
    $('#modal').modal('show');
   
};

vinculaCandidatos = function (cartaoId){
    validalogin();
    var dadosInsert = " ";
    $("input:checked").each(function(){
        dadosInsert += "("+$(this).attr("value")+","+cartaoId+"),";
    });
    dadosInsert = dadosInsert.substr(0,(dadosInsert.length - 1))+";";
    
    $.get("../funcoesBD/update/updateVinculoCandidatos.php?cartaoId="+cartaoId+"&dadosInsert="+dadosInsert, function (data){
        if (data.substring(0, 2) != 'ok'){
            alert(data);
        }else{
           $('#modal').modal('hide'); 
        }
    });    
};


modalVinculaQuesitos = function (cartaoId){
    validalogin();
    $('#tituloModal').html('Vincular Quesitos');
    $('#corpoModal').load('./form/formVinculaQuesitos.php?eventoId='+sessionStorage.getItem("eventoId")+'&cartaoId='+cartaoId);
    $('#botaoSalvar').html('\
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>\n\
        <button type="button" class="btn btn-success" onclick="vinculaQuesitos('+cartaoId+');">Salvar</button>\n\
    ');
    $('#modal').modal('show');
        
};

vinculaQuesitos = function (cartaoId){
    validalogin();
    var dadosInsert = " ";
    $("input:checked").each(function(){
        dadosInsert += "("+$(this).attr("value")+","+cartaoId+"),";
    });
    dadosInsert = dadosInsert.substr(0,(dadosInsert.length - 1))+";";
    
    $.get("../funcoesBD/update/updateVinculoQuesitos.php?cartaoId="+cartaoId+"&dadosInsert="+dadosInsert, function (data){
        if (data.substring(0, 2) != 'ok'){
            alert(data);
        }else{
           $('#modal').modal('hide'); 
        }
    });    
};