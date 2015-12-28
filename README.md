# yii2-hinter

[![Build Status](https://travis-ci.org/nevermnd/yii2-hinter.svg?branch=master)](https://travis-ci.org/nevermnd/yii2-hinter)

Yii2 hinter widget

Automatically shows a nice hint with messages flashed into session on page load.

## Installation
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ composer require nevermnd/yii2-hinter:^1.1
```

or add

```
"nevermnd/yii2-hinter": "^1.1"
```

to the `require` section of your `composer.json` file.

## Usage

```
<?= Hinter::widget([
  'errorMessageParam' => 'error',
  'successMessageParam' => 'success',
  'containerSelector' => '#main-div'
]); ?>
