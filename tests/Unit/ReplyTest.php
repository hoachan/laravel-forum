<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReplyTest extends TestCase
{
//    use RefreshDatabase;
    public $reply;
    
    public function setUp() {
        parent::setUp();
        
        $this->reply = factory('App\Reply')->create();
    }

    public function test_it_has_an_owner(){
        $this->assertInstanceOf('App\User', $this->reply->owner);
    }
}
