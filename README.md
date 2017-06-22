# Very short description of the package

Generate danish FIK numbers easily.. Not much more to say.

<p align="center"> 
<a href="https://travis-ci.org/LasseRafn/php-fik"><img src="https://img.shields.io/travis/LasseRafn/php-fik.svg?style=flat-square" alt="Build Status"></a>
<a href="https://coveralls.io/github/LasseRafn/php-fik"><img src="https://img.shields.io/coveralls/LasseRafn/php-fik.svg?style=flat-square" alt="Coverage"></a>
<a href="https://styleci.io/repos/93155252"><img src="https://styleci.io/repos/93155252/shield?branch=master" alt="StyleCI Status"></a>
<a href="https://packagist.org/packages/lasserafn/php-fik"><img src="https://img.shields.io/packagist/dt/lasserafn/php-fik.svg?style=flat-square" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/lasserafn/php-fik"><img src="https://img.shields.io/packagist/v/lasserafn/php-fik.svg?style=flat-square" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/lasserafn/php-fik"><img src="https://img.shields.io/packagist/l/lasserafn/php-fik.svg?style=flat-square" alt="License"></a>
</p>

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