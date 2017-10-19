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
    
    public $threads;


    public function setUp() {
        parent::setUp();
        
        $this->threads = factory('App\Thread')->create();
    }
    
    public function testBasicTest()
    {
        
        $response = $this->get('/threads');
        
        $response->assertStatus(200);
    }
    
    public function test_a_user_can_browse_threads(){
          
        $response = $this->get('/threads');
        
//        $response->assertSee($threads->title);
        $response->assertStatus(200);
    }
    
    public function test_a_user_access_thread_detail(){
        
        $response  = $this->get('/threads/'.$this->threads->id);
        $response->assertSee($this->threads->title);
    }
    
    public function test_a_user_can_read_replies_that_are_associate_with_a_thread (){
        
        //given we have a thread -> done
        
        //And that thread includes replies
        $reply = factory('App\Reply')
                ->create(['thread_id' => $this->threads->id]);
        //When we visit a thread page
        $this->get('/threads/'. $this->threads->id)
              ->assertSee($reply->body);
        //Then we should see te replies
    }
}
