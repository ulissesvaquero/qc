<?php
/* @var $this PerguntaController */
/* @var $data Pergunta */
?>




<?php $form=$this->beginWidget('CActiveForm', array('id'=>'form'.$data->id, "action" => ""));
?>
	
	<?php 
		if($data->link_assoc)
		{
			echo html_entity_decode($data->texto_associado);
			echo html_entity_decode($data->titulo);
		}else
		{
			echo html_entity_decode($data->titulo);
		}
	?>
	
	<div id="opResposta" class="well">
	<?php
		if($data->tipo_pergunta == 2)
		{
			$opcaoResposta = OpcaoResposta::model()->findAll('id_pergunta=:id_pergunta', array(':id_pergunta'=>(int) $data->id));
			foreach($opcaoResposta as $op)
			{
				echo $op->opcao_resposta;
			}
		}else
		{
			// Trocar pra tag echo CHtml::tag('option', array('value'=>$id),CHtml::encode($assunto),true);
			echo "<li>
			          <input name=\"resposta\" type=\"radio\" value=\"C\" style=\"vertical-align:middle;\"> Certo &nbsp;&nbsp;&nbsp;&nbsp;
			          <input name=\"resposta\" type=\"radio\" value=\"E\" style=\"vertical-align:middle;\"> Errado
        		</li>";
		}
	?>
	
	</div>
	
	<?php 
		 echo CHtml::ajaxButton('Corrigir',
								Yii::app()->createUrl('pergunta/corrigepergunta'),
								array("update" => '#correcao'.$data->id ,
									  "data" => array("idPergunta" => $data->id ,
													  "resposta" => "js:$(\"#form".$data->id." input[type=radio]:checked \").val()")),
								array("class" => "btn btn-success")); 
	?>


<?php $this->endWidget(); ?>
<div id="correcao<?php echo $data->id;?>" style="padding-top: 10px"></div>
