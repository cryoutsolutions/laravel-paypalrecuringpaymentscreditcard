laravel-paypalrecuringpaymentscreditcard
=====================

laravel-paypalrecuringpaymentscreditcard 
process  direct credit card payments recurring profiles with laravel 4
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

##Create Recurring Profile 

    $startDate= "2014-02-28T00:00:00:000Z";
    $frequency = 1;
    $period = "Month";
    $amount=1;
    $initialAmount=1;
    $description='recurring payment';
    $creditCard = Paypalpayment::CreditCardDetailsType();
    $creditCard->CreditCardNumber = "4745425765192217";
    $creditCard->CreditCardType = "Visa";
    $creditCard->CVV2 = "962";
    $creditCard->ExpMonth = 02;
    $creditCard->ExpYear = 2014;
    Paypalpayment::CreateRecurringProfile($startDate,$frequency,$period,$amount,$initialAmount,$creditCard, $description);
    
#You'll receive an answer like this:
    
    object(CreateRecurringPaymentsProfileResponseType)[141]
      public 'CreateRecurringPaymentsProfileResponseDetails' => 
        object(CreateRecurringPaymentsProfileResponseDetailsType)[150]
          public 'ProfileID' => string 'I-GK8UGKHHL712' (length=14)
          public 'ProfileStatus' => string 'PendingProfile' (length=14)
          public 'TransactionID' => string '97X027701D1414537' (length=17)
          public 'DCCProcessorResponse' => null
          public 'DCCReturnCode' => null
      public 'Timestamp' => string '2014-02-28T10:29:04Z' (length=20)
      public 'Ack' => string 'Success' (length=7)
      public 'CorrelationID' => string 'c4f4c798cc28d' (length=13)
      public 'Errors' => null
      public 'Version' => string '106.0' (length=5)
      public 'Build' => string '9777850' (length=7)

Sponsored by [therapick](http://therapick.com)
