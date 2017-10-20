<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticipateinForumTest extends TestCase
{
//    use RefreshDatabase;
    
    function test_an_authenticiated_user_my_participate_in_forum_thread(){
        
        //Give we have a authenticated user
//        $this->be($user = factory('App\User')->make()); 
        //can be write like as $this->be($user = factory('App\User')->create();
        //And an Existing thread 
        $thread = factory('App\Thread')->create();
        //When the user adds a rely to thread
        $reply = factory('App\Reply')->create(['thread_id' => $thread->id]);
        $this->post('/threads/'.$thread->id.'/repliess', $reply->toArray());
        
        //Then their reply shoud be visible on the page
        $this->get($thread->path())
             ->assertSee($reply->body);
    }
    
}
