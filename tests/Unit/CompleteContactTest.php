<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CompleteContactTest extends TestCase {

    use WithoutMiddleware;

    public function testCompleteContact(){

      //send a contact request to the route
      $response = $this->post(route('contactGuy'), [

           'name' => 'Genji Hanzo',

           'email' => 'hanzo@main.com',

           'content' => 'Hey guy, can you contact me ASAP'

       ]);

       //set url
       $url = 'http://localhost';

       //check if it redirects
       $response->assertRedirect($url.'#contact');

       //check if the flash message is present
       $response->assertSessionHas('success', 'Your email has been successfully sent!');
    }
}
