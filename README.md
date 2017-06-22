# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/LasseRafn/php-fik.svg?style=flat-square)](https://packagist.org/packages/LasseRafn/php-fik)
[![Build Status](https://img.shields.io/travis/LasseRafn/php-fik/master.svg?style=flat-square)](https://travis-ci.org/LasseRafn/php-fik)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/xxxxxxxxx.svg?style=flat-square)](https://insight.sensiolabs.com/projects/xxxxxxxxx)
[![Quality Score](https://img.shields.io/scrutinizer/g/LasseRafn/php-fik.svg?style=flat-square)](https://scrutinizer-ci.com/g/LasseRafn/php-fik)
[![Total Downloads](https://img.shields.io/packagist/dt/LasseRafn/php-fik.svg?style=flat-square)](https://packagist.org/packages/LasseRafn/php-fik)

Generate danish FIK numbers easily.

## Installation

You can install the package via composer:

```bash
composer require LasseRafn/php-fik
```

## Usage

``` php
use LasseRafn\FIK\FIK;

$FIK = new FIK();

echo $FIK->generate(1003); // 000000000100305
echo $FIK->generate(1004, $isReminder = true); // 000000000100438

// Helpers
echo fik_invoice(1003); // 000000000100305
echo fik_reminder(1004); // 000000000100438
```