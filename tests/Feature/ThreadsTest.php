<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        
        $response = $this->get('/threads');
        
        $response->assertStatus(200);
    }
    
    public function test_a_user_can_browse_threads(){
        
        $threads = factory('App\Thread')->create();
        
        $response = $this->get('/threads');
        
//        $response->assertSee($threads->title);
        $response->assertStatus(200);
    }
    
    public function test_a_user_access_thread_detail(){
        $threads = factory('App\Thread')->create();
        
        $response  = $this->get('/threads/'.$threads->id);
        $response->assertSee($threads->title);
    }
}
