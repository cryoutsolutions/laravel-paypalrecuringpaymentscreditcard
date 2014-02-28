laravel-paypalrecuringpaymentscreditcard
=====================

laravel-paypalrecuringpaymentscreditcard 
process  direct credit card payments recurring porofiles with laravel 4
Installation
=============
Install this package through Composer. To your `composer.json` file, add:

```js
"require-dev": {
    "cryoutsolutions/paypalpayment": "dev-master"
}
```

Next, run `composer update` to download it.

Add the service provider to `app/config/app.php`, within the `providers` array.

```php
'providers' => array(
    // ...

    'Cryoutsolutions\Paypalpayment\PaypalpaymentServiceProvider',
)
```

Finally, add the alias to `app/config/app.php`, within the `aliases` array.

```php
'aliases' => array(
    // ...

    'Paypalpayment'   => 'Cryoutsolutions\Paypalpayment\Facades\PaypalPayment',
)
```
##Configuration
php artisan config:publish cryoutsolutions/paypalpayment

Example Code
============

##1-Create Recurring Profile 

    $startDate= "2014-02-28T00:00:00:000Z";
    $frequency = 1;
    $period = "Month";
    $amount=1;
    $initialAmount=1;
    $creditCard = Paypalpayment::CreditCardDetailsType();
    $creditCard->CreditCardNumber = "4745425765192217";
    $creditCard->CreditCardType = "Visa";
    $creditCard->CVV2 = "962";
    $creditCard->ExpMonth = 02;
    $creditCard->ExpYear = 2014;
    Paypalpayment::CreateRecurringProfile($startDate,$frequency,$period,$amount,$initialAmount,$creditCard);

Sponsored by [therapick](http://therapick.com)
