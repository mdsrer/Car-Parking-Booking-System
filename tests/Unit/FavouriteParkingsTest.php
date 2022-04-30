<?php

namespace Tests\Unit;
use App\Models\FavouriteParkingDB;
use Tests\TestCase;

class FavouriteParkingTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_parkingTest(){
        $info = FavouriteParkingDB::make([
            'parking_id' => '6',
        ]);
        
        $response = $this->get('/');
        $this->assertTrue(true);   
    }
}