<?php

Yii::import('booster.widgets.TbPanel');


class VTbPanel extends TbPanel 
{
	public $footer;
	
	public function init() 
	{
		parent::init();
	}
	
	public function run() 
	{
		$this->renderContentEnd();
		if(!empty($this->footer))
		{
			echo "<div class=\"panel-footer clearfix\">
			
		       $this->footer
			
    		</div>";
		}
		echo CHtml::closeTag('div') . "\n";
	}
}
