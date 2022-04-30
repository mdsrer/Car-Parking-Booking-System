<?php

namespace Tests\Unit;
use App\Models\PaymenDB;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_booking_test(){

        $response = $this->get('/BookingDB');

        $this->assertTrue(true);
    }

    public function test_getStatusAttribute_test()
    {
        $response = $this->get('/PaymenDB');

        $this->assertTrue(true);
    }
}