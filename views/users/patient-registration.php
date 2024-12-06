<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div id="content">
    <div id="formContainer">
        <div id="formTitle">Enter the patient's information</div>
        <div class="dataRow">
            <?= $form->field($model, 'first_name')->textInput(['id' => 'first_name']) ?>
        </div>
        <div class="dataRow">
            <?= $form->field($model, 'last_name')->textInput(['id' => 'last_name']) ?>
        </div>
        <div class="dataRow">
            <?= $form->field($model, 'email_address')->textInput(['id' => 'email_address']) ?>
        </div>
        <div class="dataRow">
            <?= $form->field($model, 'phone')->textInput(['id' => 'phone']) ?>
        </div>
        <div class="dataRow">
            <?= $form->field($model, 'photo_document_file')->fileInput() ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Add Patient', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>