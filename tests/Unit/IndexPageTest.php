<?php

namespace Tests\Unit;

use Tests\TestCase;

class IndexPageTest extends TestCase {

    public function testIndexPage(){
        //go to index -- test for 200 code
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
