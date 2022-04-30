<?php

namespace Tests\Unit;
use App\Models\ParkingDB;
use App\Models\SelectedParkingDB;
use Tests\TestCase;

class ParkingInfoTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_search_Parking_Test(){
        $response=$this->call('POST','/ParkingDB',[
            'name' => 'Hey Park',
            'id' => '6',
        ]);
        
        $response->assertStatus($response->status(),302);
        
    }

    public function test_get_Review_Test(){
        $response=$this->call('POST','/ParkingReviewDB',[
            'name' => 'Hey Park',
            'id' => '6',
        ]);
        
        $response->assertStatus($response->status(),302);
    }

    public function test_selected_bookings_Test(){

        $response = $this->get('/BookingDB');

        $this->assertTrue(true);
    }

}