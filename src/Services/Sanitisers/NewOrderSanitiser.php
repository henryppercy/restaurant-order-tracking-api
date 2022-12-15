<?php

namespace App\Services\Sanitisers;

class NewOrderSanitiser
{
    public static function sanitise(array $orderDetails): array
    {
        $orderDetails['customerName'] = StringSanitiser::sanitiseString($orderDetails['customerName']);
        $orderDetails['customerEmail'] = StringSanitiser::sanitiseString($orderDetails['customerEmail']);
        $orderDetails['deliveryAddress'] = StringSanitiser::sanitiseString($orderDetails['deliveryAddress']);

        return $orderDetails;
    }
}