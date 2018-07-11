<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<? if (Yii::$app->session->hasFlash('error')) {
    $mess = Yii::$app->session->getFlash('error');
    $inJS = '$("#mess").html("'.$mess.'"); $("#mess_block").css("display", "flex"); $(".page").addClass("panel-open"); reEvents();';

    $this->registerJs(
        $inJS,
        yii\web\View::POS_READY
    );
}elseif (Yii::$app->session->hasFlash('reEvents')){
    $this->registerJs(
        '$(".page").removeClass("panel-open"); reEvents();',
        yii\web\View::POS_READY
    );
} ?>

<!-- Modal -->
<?php $form = ActiveForm::begin(
    [
        'id' => 'reserve_form',
        'options' =>
            [
                'class' => 'form popUp_form form_reserve flex justify-content-center align-items-center',
                'style' => 'display:none;',
                'data' => ['pjax' => true]
            ]
    ]); ?>
    <div class="container">
        <div class="row">
            <div class="formBody col-12">
                <div class="row interLine">
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
                    <h2 class="formTitle col-12">ЗАБРОНИРОВАТЬ МЕСТА</h2>
                    <div class="col-1 colDisplay-sm"></div>
                    <div class="col-12 col-sm-10 col-lg-3">
                        <p class="input" id="class_show">
                            <span></span>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13px" height="17px">
                                <path fill-rule="evenodd"  fill="rgb(255, 255, 255)" d="M10.674,6.761 L10.674,4.674 C10.674,2.369 8.805,0.501 6.500,0.501 C4.195,0.501 2.326,2.369 2.326,4.674 L2.326,6.761 C1.558,6.761 0.935,7.383 0.935,8.152 L0.935,15.108 C0.935,15.876 1.558,16.499 2.326,16.499 L10.674,16.499 C11.442,16.499 12.065,15.876 12.065,15.108 L12.065,8.152 C12.065,7.383 11.442,6.761 10.674,6.761 ZM3.718,4.674 C3.718,3.137 4.963,1.892 6.500,1.892 C8.036,1.892 9.282,3.137 9.282,4.674 L9.282,6.761 L3.718,6.761 L3.718,4.674 ZM10.674,15.108 L2.326,15.108 L2.326,8.152 L10.674,8.152 L10.674,15.108 ZM5.804,12.133 L5.804,13.021 C5.804,13.405 6.116,13.717 6.500,13.717 C6.884,13.717 7.196,13.405 7.196,13.021 L7.196,12.133 C7.609,11.892 7.891,11.448 7.891,10.934 C7.891,10.166 7.268,9.543 6.500,9.543 C5.732,9.543 5.109,10.166 5.109,10.934 C5.109,11.448 5.390,11.892 5.804,12.133 Z"/>
                            </svg>
                        </p>
                        <?= $form->field($model, 'class')->hiddenInput([ 'placeholder' => "", 'id' => 'class'])->label(false) ?>
                    </div>
                    <div class="col-1 colDisplay-sm colNone-lg"></div>
                    <div class="col-1 colDisplay-sm colNone-lg"></div>
                    <div class="col-12 col-sm-5 col-lg-4">
                        <?= $form->field($model, 'name')->textInput(['placeholder' => "Ваше имя", 'class' => "input"])->label(false) ?>
                    </div>
                    <div class="col-12 col-sm-5 col-lg-3">
                        <?= $form->field($model, 'phone')->input('tel',['placeholder' => "+7 (___)-___-__-__", 'class' => "input phoneMask"])->label(false) ?>
                    </div>
                    <div class="col-1 colDisplay-sm"></div>
                    <div class="col-1 colDisplay-sm"></div>
                    <div class="col-6 col-sm-4 col-md-7">
                        <p class="stageTitle">Количество мест</p>
                        <div class="countWrap flex align-items-end">
                            <div class="countSelect">1</div>
                            <div class="countSelect">2</div>
                            <div class="countSelect">3</div>
                            <div class="countSelect">4</div>
                            <div class="countSelect">5</div>
                            <div class="countSelect">6</div>
                            <div class="countSelect">7</div>
                            <div class="countSelect">8</div>
                            <div class="countSelect end">9</div>
                            <?= $form->field($model, 'placeCount')->input('number',['placeholder' => "", 'id' => 'count_inp', 'class' => "input count"])->label(false) ?>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="countShowWrap row justify-content-end align-items-end">
                            <div class="col-auto">
                                <p class="stageTitle">Мест осталось</p>
                                <div id="countShake" class="countWrap flex align-items-end">
                                    <div class="countShow" id="hundred">0</div>
                                    <div class="countShow" id="ten">0</div>
                                    <div class="countShow" id="one">5</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1 colDisplay-sm"></div>
                    <div class="col-1 colDisplay-sm"></div>
                    <div class="col-6 col-sm-5 col-md-4">
                        <p class="stageTitle">Как добраться</p>
                        <label for="car" class="labelInpRadio flex align-items-center">
                            <span class="radioWrap">
                                <?= $form->field($model, 'transfer', ['template' => '{input}', 'options' => ['tag' => false]])->radio(['id' => 'car', 'class' => "inpRadio", 'value' => 'N', 'style' => 'display:none'], false)->label(false) ?>
                                <span class="radioChecked"></span>
                            </span>
                            <span class="radioTitle">Свой автомобиль</span>
                        </label>
                        <label for="transfer" class="labelInpRadio flex align-items-center">
                            <span class="radioWrap">
                                <?= $form->field($model, 'transfer', ['template' => '{input}', 'options' => ['tag' => false]])->radio(['id' => 'transfer', 'class' => "inpRadio", 'value' => 'Y', 'style' => 'display:none', 'checked ' => true], false)->label(false) ?>
                                <span class="radioChecked"></span>
                            </span>
                            <span class="radioTitle">Трансфер</span>
                        </label>
                    </div>
                    <div class="col-2 colDisplay-md"></div>
                    <div class="col-6 col-sm-5 col-md-4 flex flex-column justify-content-end align-items-end">
                        <p class="stageTitle totalPrice"></p>
                        <?= Html::submitButton(
                            '<svg class="ico" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="16px">
                                <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                                      d="M21.324,15.992 L2.676,15.992 C1.610,15.992 0.678,15.059 0.678,13.994 L0.678,2.006 C0.678,0.940 1.610,0.008 2.676,0.008 L21.324,0.008 C22.389,0.008 23.322,0.940 23.322,2.006 L23.322,13.994 C23.322,15.059 22.390,15.992 21.324,15.992 ZM2.010,13.994 C2.010,14.393 2.276,14.660 2.676,14.660 L21.324,14.660 C21.723,14.660 21.990,14.393 21.990,13.994 L21.990,6.801 L2.010,6.801 L2.010,13.994 ZM2.010,5.469 L21.990,5.469 L21.990,4.403 L2.010,4.403 L2.010,5.469 ZM21.990,2.006 C21.990,1.606 21.723,1.340 21.324,1.340 L2.676,1.340 C2.276,1.340 2.010,1.606 2.010,2.006 L2.010,3.072 L21.990,3.072 L21.990,2.006 ZM12.266,12.662 L4.141,12.662 C3.741,12.662 3.475,12.395 3.475,11.996 C3.475,11.596 3.742,11.330 4.141,11.330 L12.266,11.330 C12.666,11.330 12.932,11.596 12.932,11.996 C12.932,12.395 12.533,12.662 12.266,12.662 ZM7.604,9.864 L4.141,9.864 C3.742,9.864 3.475,9.598 3.475,9.198 C3.475,8.799 3.742,8.533 4.141,8.533 L7.604,8.533 C8.004,8.533 8.270,8.799 8.270,9.198 C8.270,9.598 8.004,9.864 7.604,9.864 Z"/>
                            </svg>
                            ПЕРЕЙТИ К ОПЛАТЕ',
                            [
                                'class' => 'btn_form shadowBtn blackBtn flex justify-content-center align-items-center',
                                'data-id' => '#reserve',
                                'data-close' => 'true'
                            ]) ?>
                    </div>
                    <div class="col-1 colDisplay-sm"></div>
                    <div class="col-12 agreeNew">Переходя к оплате, вы соглашаетесь c <a class="runAgree">пользовательским соглашением</a></div>
                </div>
                <div class="row infoLine justify-content-center">
                    <div class="infoWrap col-10">
                        <p class="infoTitle">
                            <span class="transfer infoVar">
                                Трансфер
                            </span>
                            <span class="car infoVar" style="display: none">
                                Свой автомобиль
                            </span>
                        </p>
                        <p class="infoText">
                            <span class="transfer infoVar">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            </span>
                            <span class="car infoVar" style="display: none">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>
