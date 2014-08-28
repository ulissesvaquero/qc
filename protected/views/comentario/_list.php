<?php 
	$qtdComentario = $dataProvider->getTotalItemCount();
	$data = $dataProvider->getData();
	$qtdArr = count($data);
?>
<?php 
	foreach($data as $d):
?>

<ul class="media-list">
  <li class="media">
    <a class="pull-left" href="#">
      <img class="media-object" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PHJlY3Qgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0IiBmaWxsPSIjZWVlIi8+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iMzIiIHk9IjMyIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9zdmc+" alt="teste">
    </a>
    <div class="media-body">
      <?php $usuario = Usuario::model()->find('id ='.$d->id_usuario); ?>
      <h4 class="media-heading"><?php echo $usuario->nome; echo $d->id; ?></h4>
      <?php echo $d->comentario;?>
    </div>
  </li>
</ul>
<?php endforeach;?>

<?php
	if($qtdComentario > 5 && !isset($insert) && $qtdArr == $dataProvider->criteria->limit)
	{
		echo CHtml::ajaxButton('carregar mais comentários',
								Yii::app()->createUrl('comentario/getcomentario'),
								array("success" => 'js:function(retorno){retornaGetComentario(retorno);}',
									  //'beforeSend' => '$(this).addClass(\'disabled\')',
								//array("update" => '#comentario'.$id,
									  "data" => array("idPergunta" => $d->id_pergunta,'offset' => 'js:$(\'#hiddenOffset'.$d->id_pergunta.'\').val()')),
								array("class" => "btn btn-primary btn-md pull-right clearfix",
									  'style'=>'width:100%;margin-bottom:10px',
									  'id' =>'btCarregaGetComentario'.$d->id_pergunta,
									));
		
	}



?>
