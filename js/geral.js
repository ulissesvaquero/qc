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