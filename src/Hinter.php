<?php

namespace nevermnd\hinter;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\ArrayHelper as Arr;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * Class Hinter
 *
 * @author Thiago Oliveira <thiago.oliveira.gt14@gmail.com>
 */
class Hinter extends Widget
{
    /**
     * @var string The key name of the success messages flashed into session.
     */
    public $successMessageParam = 'success';
    /**
     * @var string The key name of the error messages flashed into session.
     */
    public $errorMessageParam = 'error';
    /**
     * @var array Options for the hinter plugin.
     */
    public $clientOptions = [];
    /**
     * @var string The selector in which the messages will be appended.
     */
    public $containerSelector = 'body';

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (!$this->containerSelector) {
            throw new InvalidConfigException('containerSelector must be set');
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $view = $this->getView();
        HinterAsset::register($view);

        $id = ArrayHelper::getValue($this->clientOptions, 'id', $this->getId());
        $this->setId($id);

        $isSuccess = Yii::$app->getSession()->hasFlash($this->successMessageParam);
        $message = Yii::$app->getSession()->getFlash($isSuccess ? $this->successMessageParam : $this->errorMessageParam);

        if (!empty($message)) {
            $this->clientOptions = Arr::merge($this->clientOptions, compact('isSuccess', 'message', 'id'));
            $view->registerJs("$('$this->containerSelector').hinter(" . Json::encode($this->clientOptions) . ");");
        }
    }
}
