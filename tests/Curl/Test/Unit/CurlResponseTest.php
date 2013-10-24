<?php

namespace Curl\Test\Unit;

use shuber\Curl\CurlResponse;

class CurlResponseTest extends \PHPUnit_Framework_TestCase {

    private $response;

    function setUp() {
        $this->response = new CurlResponse($this->responseSample());
    }


    /**
     * @test
     */
    function itSeparatesResponseHeadersFromBody() {
        $this->assertTrue(is_array($this->response->headers));
        $this->assertRegExp('/<!doctype/', $this->response->body);
    }


    /**
     * @test
     */
    function itSetsStatusHeaders() {
        $this->assertEquals(200, $this->response->headers['Status-Code']);
        $this->assertEquals('200 OK', $this->response->headers['Status']);
    }


    /**
     * @test
     */
    function itReturnsTheResponseBodyWhenConvertingToString() {
        $content = (string)$this->response;
        $this->assertRegExp('/^<!doctype.*/', $content);
    }


    private function responseSample()
    {
        return "HTTP/1.1 200 OK\r\n" .
               "Location: http://www.google.es/?gws_rd=cr&ei=R_BoUvXLOoe84ASasIHQAg\r\n" .
               "Cache-Control: private\r\n" .
               "Content-Type: text/html; charset=UTF-8\r\n" .
               "Date: Thu, 24 Oct 2013 10:02:47 GMT\r\n" .
               "Server: gws\r\n" .
               "Content-Length: 258\r\n" .
               "X-XSS-Protection: 1; mode=block\r\n" .
               "X-XSS-Protection: 1; mode=block\r\n" .
               "X-Frame-Options: SAMEORIGIN\r\n" .
               "Alternate-Protocol: 80:quick\r\n" .
               "\r\n" .
               "<!doctype html><html><head></head><body>Hi there!</body></html>";
    }
}