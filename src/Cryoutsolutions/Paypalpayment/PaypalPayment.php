<?php namespace Cryoutsolutions\Paypalpayment;

use ActivationDetailsType;
use BasicAmountType;
use BillingPeriodDetailsType;
use CreateRecurringPaymentsProfileReq;
use CreateRecurringPaymentsProfileRequestDetailsType;
use CreateRecurringPaymentsProfileRequestType;
use CreditCardDetailsType;
use Illuminate\Support\Facades\Config;
use PayPalAPIInterfaceServiceService;
use RecurringPaymentsProfileDetailsType;
use ScheduleDetailsType;

class PaypalPayment{
  

    // Class functions

    public static function CreateRecurringProfile($startDate,$frequency,$period,$amount,$initialAmount,$creditCard)
    {
        
        $profileDetails = PaypalPayment::RecurringPaymentsProfileDetailsType();
        $profileDetails->BillingStartDate = $startDate;

        $paymentBillingPeriod = PaypalPayment::BillingPeriodDetailsType();
        $paymentBillingPeriod->BillingFrequency = $frequency;
        $paymentBillingPeriod->BillingPeriod = $period;
        $paymentBillingPeriod->Amount = PaypalPayment::BasicAmountType("USD", $amount);
        $actDetails=PaypalPayment::ActivationDetailsType();
        $actDetails->InitialAmount=PaypalPayment::BasicAmountType("USD",$initialAmount);
        $scheduleDetails = PaypalPayment::ScheduleDetailsType();
        $scheduleDetails->ActivationDetails=$actDetails;
        $scheduleDetails->Description = "recurring billing";
        $scheduleDetails->PaymentPeriod = $paymentBillingPeriod;

        $createRPProfileRequestDetails = PaypalPayment::CreateRecurringPaymentsProfileRequestDetailsType();
        $createRPProfileRequestDetails->CreditCard = $creditCard;

        $createRPProfileRequestDetails->ScheduleDetails = $scheduleDetails;
        $createRPProfileRequestDetails->RecurringPaymentsProfileDetails = $profileDetails;

        $createRPProfileRequest = PaypalPayment::CreateRecurringPaymentsProfileRequestType();
        $createRPProfileRequest->CreateRecurringPaymentsProfileRequestDetails = $createRPProfileRequestDetails;

        $createRPProfileReq = PaypalPayment::CreateRecurringPaymentsProfileReq();
        $createRPProfileReq->CreateRecurringPaymentsProfileRequest = $createRPProfileRequest;

        
        $paypalService = PaypalPayment::PayPalAPIInterfaceServiceService();
        $createRPProfileResponse = $paypalService->CreateRecurringPaymentsProfile($createRPProfileReq);
        return $createRPProfileResponse;
    }
    public static function ActivationDetailsType() {
        return new ActivationDetailsType();
    }
    public static function BasicAmountType($currency,$value) {
        return new BasicAmountType($currency,$value);
    }
    public static function BillingPeriodDetailsType() {
        return new BillingPeriodDetailsType();
    }
    public static function CreateRecurringPaymentsProfileReq() {
        return new CreateRecurringPaymentsProfileReq();
    }
    public static function CreateRecurringPaymentsProfileRequestDetailsType() {
        return new CreateRecurringPaymentsProfileRequestDetailsType();
    }
    public static function CreateRecurringPaymentsProfileRequestType() {
        return new CreateRecurringPaymentsProfileRequestType();
    }
    public static function CreditCardDetailsType() {
        return new CreditCardDetailsType();
    }
    public static function PayPalAPIInterfaceServiceService() {
        $config = Config::get('paypalpayment::config');
        return new PayPalAPIInterfaceServiceService($config);
    }
    public static function RecurringPaymentsProfileDetailsType() {
        return new RecurringPaymentsProfileDetailsType();
    }
    public static function ScheduleDetailsType() {
        return new ScheduleDetailsType();
    }

}
