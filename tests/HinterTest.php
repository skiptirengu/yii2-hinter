<?php

namespace nevermnd\hinter\tests;

use PHPUnit_Framework_TestCase;
use Yii;

/**
 * Class HinterTest
 *
 * @author Thiago Oliveira <thiago.oliveira.gt14@gmail.com>
 */
class HinterTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
        Yii::setAlias('@bower', __DIR__ . '/../vendor/bower-asset');
        Yii::$app->getSession()->removeAllFlashes();
    }

    public function testMessage()
    {
        Yii::$app->getSession()->setFlash('success', 'Test');
        list($actual, $expected) = $this->runTtest('test.bin');

        $this->assertEquals($expected, $actual);
    }

    public function testEmptyMessage()
    {
        list($actual, $expected) = $this->runTtest('test_empty.bin');

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    protected function runTtest($file)
    {
        $view = Yii::$app->getView();
        $content = $view->render('//test');

        $actual = $view->render('//layouts/main', compact('content'));
        $expected = file_get_contents(__DIR__ . "/data/$file");

        return [$actual, $expected];
    }
}