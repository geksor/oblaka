<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<?php if (Yii::$app->session->hasFlash('success') || Yii::$app->session->hasFlash('error')) { ?>

    <?php
    if (Yii::$app->session->hasFlash('success')){
        $mess = Yii::$app->session->getFlash('success');
    }elseif (Yii::$app->session->hasFlash('error')){
        $mess = Yii::$app->session->getFlash('error');
    }
    $inJS = '$("#mess").html("'.$mess.'"); $("#mess_block").css("display", "flex"); $(".page").addClass("panel-open"); reEvents();';

    $this->registerJs(
        $inJS,
        yii\web\View::POS_READY
    );
    ?>
<?php } ?>

<!-- Modal -->
<?php $form = ActiveForm::begin(
    [
    'id' => 'callBack_form',
    'options' =>
    [
        'class' => 'form popUp_form form_callBack flex justify-content-center align-items-center',
        'style' => 'display:none;',
        'data' => ['pjax' => true]
    ]
    ]); ?>
    <div class="container">
        <div class="row panel-open justify-content-center align-items-center">
            <div class="formBody col-12 col-sm-10 col-md-6 col-lg-5 col-xl-4">
                <div class="row">
                    <div class="closeWrap col-12">
                        <div class="row justify-content-end">
                            <div class="close">
                                <svg class="closeSvg" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid"
                                     width="32" height="33" viewBox="0 0 32 33">
                                    <path d="M0.431,2.653 C-0.168,2.052 -0.168,1.053 0.431,0.432 C1.051,-0.169 2.028,-0.169 2.649,0.432 L15.956,13.782 L29.285,0.432 C29.885,-0.169 30.882,-0.169 31.480,0.432 C32.101,1.053 32.101,2.054 31.480,2.653 L18.173,15.982 L31.480,29.333 C32.101,29.933 32.101,30.932 31.480,31.554 C30.881,32.154 29.883,32.154 29.285,31.554 L15.956,18.203 L2.649,31.554 C2.028,32.154 1.051,32.154 0.431,31.554 C-0.168,30.932 -0.168,29.932 0.431,29.333 L13.738,15.982 L0.431,2.653 Z"
                                          transform="translate(0.03 0.49)" class="cls-1"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <?= $form->field($model, 'name')->textInput(['placeholder' => "Имя Отчество", 'class' => "clear input"])->label(false) ?>
                    </div>
                    <div class="col-12">
                        <?= $form->field($model, 'phone')->input('tel',['placeholder' => "+7 (___)-___-__-__", 'class' => "clear input phoneMask"])->label(false) ?>
                    </div>
                    <input name="CALLBACK" type="hidden" value="true">
                    <div class="col-12">
                        <?= Html::submitButton(
                            'Отправить',
                            [
                                'class' => 'btn_form only100prc shadowBtn blackBtn flex justify-content-center align-items-center',
                                'data-id' => '#callBack',
                                'data-close' => 'true'
                            ]) ?>
                    </div>
                    <div class="col-12 agreeNew noMargin">Нажимая кнопку отправить, вы соглашаетесь c <a class="runAgree">пользовательским соглашением</a></div>
                </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>
