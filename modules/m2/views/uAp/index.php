<?php
$this->breadcrumbs=array(

	'U Aps'=>array('index'),

	'Manage',

);


$this->menu=array(
	array('label'=>'AP Supplier', 'icon'=>'home', 'url'=>array('/m2/uAp/apSupplier')),
);


?>


<div class="page-header">
<h1>Account Payable</h1>
</div>

<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => array(
        array('label' => 'Unpaid. New Purchased Order', 'url' => Yii::app()->createUrl('/m2/uAp'),'active'=>true),
        array('label' => 'Half Paid', 'url' => Yii::app()->createUrl('/m2/uAp/onHalfPaid')),
        array('label' => 'Paid. Post to GL', 'url' => Yii::app()->createUrl('/m2/uAp/onPaid')),
        array('label' => 'Recent AP', 'url' => Yii::app()->createUrl('/m2/uAp/onRecent')),
    ),
));
?>



<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'u-po-grid',
	'dataProvider'=>uPo::model()->newPo(),
	//'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'system_ref',
			'type'=>'raw',
			'value'=>'CHtml::link( (!isset($data->ap)) ? $data->system_ref. " (new)" : $data->system_ref,Yii::app()->createUrl("/m2/uAp/view",array("id"=>$data->id)))'
		),
		'input_date',
		//'entity.name',
		array(
			'header'=>'Supplier',
			'type' =>'raw',
			'value'=>'CHtml::link($data->supplier->company_name,Yii::app()->createUrl("/m2/uAp/apSupplierView",array("id"=>$data->supplier_id)))',
		),
		'po_type_id',
		'remark',
		array(
			'name'=>'poDetail.amount',
            'value' => 'Yii::app()->indoFormat->number($data->poSum)',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
		),
/*
		array(
			'header'=>'Check Total',
			'name'=>'total_amount',
            'value' => 'Yii::app()->indoFormat->number($data->ap->total_amount)',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
		),
*/
		//array(
		//	'class'=>'bootstrap.widgets.TbButtonColumn',
		//	'template'=>'{delete}',
		//),

	),

)); ?>

