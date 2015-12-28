<?php

namespace nevermnd\hinter\tests;

/**
 * Class HinterTest
 *
 * @author Thiago Oliveira <thiago.oliveira.gt14@gmail.com>
 */
class HinterTest extends \PHPUnit_Framework_TestCase
{

    public function testWidget()
    {
        \Yii::setAlias('@bower', __DIR__ . '/../vendor/bower-asset');

        $view = \Yii::$app->getView();
        $content = $view->render('//test');
        $actual = $view->render('//layouts/main', compact('content'));
        $expected = file_get_contents(__DIR__ . '/data/test.bin');

        $this->assertEquals($expected, $actual);
    }
}