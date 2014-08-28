<?php if(Yii::app()->session['header']):?>
<header class="masthead subhead" id="overview">
    <div class="container">
       <?php echo Yii::app()->session['header'];unset(Yii::app()->session['header']);?>
    </div>
</header>
<?php endif;?>