<?php

namespace Curl\Test\Unit;

use shuber\Curl\Curl;

class CurlTest extends \PHPUnit_Framework_TestCase {

    /**
     * @test
     */
    function itAllowsAddingHeaders()
    {
        $curl = new Curl;

        $curl->add_header('Expect', '');

        $this->assertEquals(array('Expect' => ''), $curl->headers);
    }
}
