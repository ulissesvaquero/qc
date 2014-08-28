function botaoComentario(form)
{
	if(form.find(':button').val() == "Postando...")
	{
		form.find(':button').removeClass('disabled');
		form.find(':button').val('Postar Comentário');
	}else
	{
		form.find(':button').addClass('disabled');
		form.find(':button').val('Postando...');
	}
}

function retornoCadastrarComentario(id,retorno)
{
	$('#formComentario'+id).get(0).reset();
	botaoComentario($('#formComentario'+id));
	var obj = JSON.parse(retorno);
	if(obj.status == 1)
	{
		$('#alertComentario'+id).html(obj.cStatus);
		$('#comentario'+id).prepend(obj.conteudo);
	}else
	{
		$('#alertComentario'+id).html(obj.cStatus);
	}
}

function retornaGetComentario(retorno)
{
	var obj = JSON.parse(retorno);
	$("#btCarregaGetComentario"+obj.id_pergunta).remove();
	$("#comentario"+obj.id_pergunta).append(obj.conteudo);
	var offset = parseInt($("#hiddenOffset"+obj.id_pergunta).val());
	$("#hiddenOffset"+obj.id_pergunta).val(offset+5);
}