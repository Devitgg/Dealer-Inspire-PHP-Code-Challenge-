<?php

namespace Tests\Unit;

use Tests\TestCase;

class IndexPageTest extends TestCase {

    public function testIndexPage(){
        //go to index
        $response = $this->get('/');

        //check for 200 code
        $response->assertStatus(200);
    }
}
