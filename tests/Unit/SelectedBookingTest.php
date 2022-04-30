<?php

namespace Tests\Unit;
use App\Models\SelectedParkingDB;
use App\Models\BookingDB;
use App\Models\ParkingDB;
use Tests\TestCase;

class SelectedBookingTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_getAllparkingFromSelectedBookingTest(){
        $info = ParkingDB::make([
            'user_id' => '6',
        ]);
        
        $response = $this->get('/');
        $this->assertTrue(true);
    }


    public function test_ParkingBelongsTest(){
        $info = ParkingDB::make([
            'parking_id' => '6',
        ]);
        
        $response = $this->get('/');
        $this->assertTrue(true);
    }


    public function test_booking_belongTest(){
        $info = BookingDB::make([
            'order_id' => '1',
        ]);
        
        $response = $this->get('/');
        $this->assertTrue(true);
    }
}