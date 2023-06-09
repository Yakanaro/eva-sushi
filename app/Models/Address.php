<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['street', 'house', 'building', 'entrance', 'apartment', 'floor', 'intercom_code'];


    public function fullAddress(Address $address): string
    {
        $addressParts = [
            'street' => 'Улица',
            'house' => 'Дом',
            'building' => 'Корпус',
            'entrance' => 'Подъезд',
            'floor' => 'Этаж',
            'apartment' => 'Кв.',
            'intercom_code' => 'Код домофона',
        ];

        $fullAddress = '';

        foreach ($addressParts as $property => $label) {
            if (!empty($address->$property)) {
                $fullAddress .= $label . ' ' . $address->$property . ', ';
            }
        }

        return rtrim($fullAddress, ', ');
    }
}
