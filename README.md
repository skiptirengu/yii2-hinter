# yii2-hinter

[![Build Status](https://travis-ci.org/skiptirengu/yii2-hinter.svg?branch=master)](https://travis-ci.org/skiptirengu/yii2-hinter)

Yii2 [hinter.js](https://github.com/nevermnd/hinter.js) widget.

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

```php
<?= Hinter::widget([
  'errorMessageParam'   => 'error',
  'successMessageParam' => 'success',
  'containerSelector'   => '#main-div'
]); ?>
```

For complete documentation, visit the [hinter.js](https://github.com/nevermnd/hinter.js) page.

## License

Licensed under the incredibly [permissive](http://en.wikipedia.org/wiki/Permissive_free_software_licence) [MIT license](http://creativecommons.org/licenses/MIT/)
