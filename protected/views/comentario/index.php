<?php 
$this->widget(
		'booster.widgets.TbJsonGridView',
		array(
				'dataProvider' => $dataProvider,
				//'filter' => $model,
				'type' => 'striped bordered condensed',
				'summaryText' => false,
				'cacheTTL' => 10, // cache will be stored 10 seconds (see cacheTTLType)
				'cacheTTLType' => 's', // type can be of seconds, minutes or hours
				'columns' => array(
						'id',
						'name',
						array(
								'name' => 'create_time',
								'type' => 'datetime'
						),
						array(
								'header' => Yii::t('ses', 'Edit'),
								'class' => 'booster.widgets.TbJsonButtonColumn',
								'template' => '{view} {delete}',
								'viewButtonUrl' => null,
								'updateButtonUrl' => null,
								'deleteButtonUrl' => null,
								'buttons' => array(
										'delete' => array(
												'click' => 'function(){return false;}'
										)
								)
						),
				),
		)
);

?>