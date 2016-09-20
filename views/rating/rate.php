<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ChannelWindDeductible */

$this->title = 'Rate Channel Wind Deductible';
$this->params['breadcrumbs'][] = ['label' => 'Channel Wind Deductibles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="channel-wind-deductible-create">

    <h1><?= Html::encode($this->title) ?></h1>
    
<div class="row">
    <div class="col-xs-12 col-md-4">
        <div class="channel-wind-deductible-form">

            <?php $form = ActiveForm::begin(array('enableClientValidation'=>false)); ?>

            <?= $form->field($model, 'wind_deductible_buy_back_limit')->textInput() ?>

            <?= $form->field($model, 'deductible')->textInput(array('readonly'=>true)) ?>

            <?= $form->field($model, 'base_rate')->textInput() ?>

            <?= $form->field($model, 'credit_modification')->textInput() ?>

            <?= $form->field($model, 'debit_modification')->textInput() ?>

            <?= $form->field($model, 'premium_price')->textInput(array('readonly'=>true)) ?>

       

            <div class="form-group">
                <?= Html::submitButton('Save ALL' , ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
    <div class="col-xs-6 col-md-6"></div>
</div>


</div>


<script>
    $(function (){
          var Deductible;
        
            $('#channelwinddeductible-wind_deductible_buy_back_limit').on('keyup',function(){
                wind_deductible_buy_back_limit = parseFloat($('#channelwinddeductible-wind_deductible_buy_back_limit').val());

                if(wind_deductible_buy_back_limit > <?php echo $config['value'] ?>){
                   Deductible = wind_deductible_buy_back_limit*0.07;
                }else{
                     Deductible = wind_deductible_buy_back_limit*0.05;
                }     
                $('#channelwinddeductible-deductible').val(Deductible);
            })
          
            $('#channelwinddeductible-base_rate').on('keyup',function(){
                   calculate();
            })
            $('#channelwinddeductible-credit_modification').on('keyup', function () {
                   calculate();
            })
            $('#channelwinddeductible-debit_modification').on('keyup', function () {
                   calculate();
            })
        })
        
        function calculate (){
            base_rate = parseFloat($('#channelwinddeductible-base_rate').val())/100;
            credit_modification = parseFloat($('#channelwinddeductible-credit_modification').val())/100;
            debit_modification = parseFloat($('#channelwinddeductible-debit_modification').val())/100;
            wind_deductible_buy_back_limit = parseFloat($('#channelwinddeductible-wind_deductible_buy_back_limit').val());

              if(wind_deductible_buy_back_limit > <?php echo $config['value'] ?>){
                 Deductible = wind_deductible_buy_back_limit*0.07;
              }else{
                   Deductible = wind_deductible_buy_back_limit*0.05;
              }
              console.log(base_rate);
              console.log(credit_modification);
              console.log(debit_modification);
              console.log(wind_deductible_buy_back_limit);
              premium_price = ((wind_deductible_buy_back_limit - Deductible) * (base_rate * (1 + (debit_modification - credit_modification  ))));
            $('#channelwinddeductible-premium_price').val(Math.round(premium_price * 100) / 100);
        }
</script>