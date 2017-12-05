<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class IncompleteContactTest extends TestCase {

    use WithoutMiddleware;

    public function testMissingName(){

      //send a contact request to the route
      $response = $this->post(route('contactGuy'), [
          'email'   => 'hanzo@main.com',
          'content' => 'Hey guy, can you contact me ASAP'
       ]);

       //set url
       $url = 'http://localhost';

       //check if it redirects
       $response->assertRedirect($url);

       //confirm error in session from validator
       $response->assertSessionHasErrors();
    }


    public function testMissingEmail(){

      //send a contact request to the route
      $response = $this->post(route('contactGuy'), [
          'name'     => 'Joe Smoothy',
          'content'  => 'Hey guy, can you contact me ASAP'
       ]);

       //set url
       $url = 'http://localhost';

       //check if it redirects
       $response->assertRedirect($url);

       //confirm error in session from validator
       $response->assertSessionHasErrors();
    }


    public function testMissingContent(){
      
      //send a contact request to the route
      $response = $this->post(route('contactGuy'), [
          'name'    => 'Joe Smoothy',
          'email'   => 'hanzo@main.com'
       ]);

       //set url
       $url = 'http://localhost';

       //check if it redirects
       $response->assertRedirect($url);

       //confirm error in session from validator
       $response->assertSessionHasErrors();
    }
}
