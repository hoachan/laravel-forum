<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadTest extends TestCase
{
    public $thread;


    public function setUp() {
        parent::setUp();
        
        $this->thread = factory('App\Thread')->create(); 
    }

    public function test_a_thread_can_add_a_reply(){
        $this->thread->addReply([
            'body'      => 'Foo Bar',
            'user_id'   => 1
        ]);
        
        $this->assertCount(1, $this->thread->replies);
    }
    
}
