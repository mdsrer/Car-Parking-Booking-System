<?php

namespace Tests\Unit;
use App\Models\BookingDB;
use Tests\TestCase;

class BookingTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_selectedparking_info_Test(){
        $response=$this->call('POST','/SelectedParkingDB',[
            'order_id' => '3',
            'id' => '6',
        ]);
        
        $response->assertStatus($response->status(),302);
        
    }

    public function test_selectedbookingTest(){
        $response = $this->get('/SelectedBookingDB');

        $this->assertTrue(true);
    }

    public function test_user(){

    $response=$this->call('POST','/User',[
        'user_id' => '3',

    ]);

    $response->assertStatus($response->status(),302);
    
    }
}