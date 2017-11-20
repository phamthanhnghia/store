<?php
$this->breadcrumbs=array(
	$this->singleTitle,
);

$menus=array(
            array('label'=>"Create $this->singleTitle", 'url'=>array('create')),
);
$this->menu= ControllerActionsName::createMenusRoles($menus, $actions);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('murad-product-grid', {
                url : $(this).attr('action'),
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Danh Sách <?php echo $this->pluralTitle; ?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'murad-banner-grid',
    'dataProvider' => $model->search(),
    'afterAjaxUpdate' => 'function(id, data){ fnUpdateColorbox();}',
    'template' => '{pager}{summary}{items}{pager}{summary}',
    'pager' => array(
        'maxButtonCount' => CmsFormatter::$PAGE_MAX_BUTTON,
    ),
    'enableSorting' => false,
    //'filter'=>$model,
    'columns' => array(
        array(
            'header' => 'S/N',
            'type' => 'raw',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
            'headerHtmlOptions' => array('width' => '10px', 'style' => 'text-align:center;'),
            'htmlOptions' => array('style' => 'text-align:center;')
        ),
            'name',
            'phone',
            'address',
            'dob',
            'gender',
        array(
            'header' => 'Actions',
            'class' => 'CButtonColumn',
            'template' => ControllerActionsName::createIndexButtonRoles($actions),
        ),
    ),
));
?>

<script>
$(document).ready(function() {
    fnUpdateColorbox();
});

function fnUpdateColorbox(){   
    fixTargetBlank();
    jQuery('a.gallery').colorbox({ opacity:0.5 , rel:'group1',innerHeight:'1000', innerWidth: '1050' });
}
</script>