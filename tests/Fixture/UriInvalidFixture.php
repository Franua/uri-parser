<?php

namespace Tests\Fixture;

/**
 * Fixtures are prepared based on https://mathiasbynens.be/demo/url-regex
 * Class UriInvalidFixture
 * @package Tests\Fixture
 */
class UriInvalidFixture
{
    private static $fixtures = [
        ["http://"],
        ["http://."],
        ["http://.."],
        ["http://../"],
        ["http://?"],
        ["http://??"],
        ["http://??/"],
        ["http://#"],
        ["http://##"],
        ["http://##/"],
        ["http://foo.bar?q=Spaces should be encoded"],
        ["//"],
        ["//a"],
        ["///a"],
        ["///"],
        ["http:///a"],
        ["foo.com"],
        ["rdar://1234"],
        ["h://test"],
        ["http:// shouldfail.com"],
        [":// should fail"],
        ["http://foo.bar/foo(bar)baz quux"],
        ["ftps://foo.bar/"],
        ["http://-error-.invalid/"],
        ["http://a.b--c.de/"],
        ["http://-a.b.co"],
        ["http://a.b-.co"],
        ["http://0.0.0.0"],
        ["http://10.1.1.0"],
        ["http://10.1.1.255"],
        ["http://224.1.1.1"],
        ["http://1.1.1.1.1"],
        ["http://123.123.123"],
        ["http://3628126748"],
        ["http://.www.foo.bar/"],
        ["http://www.foo.bar./"],
        ["http://.www.foo.bar./"],
        ["http://10.1.1.1"],
        ["http://10.1.1.254"],
    ];

    /**
     * @return array
     */
    public static function getFixtures()
    {
        return self::$fixtures;
    }
}
