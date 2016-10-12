<?php

namespace Tests\Fixture;

/**
 * Fixtures are created based https://mathiasbynens.be/demo/url-regex
 * Class UriValidFixture
 * @package Tests\Fixture
 */
class UriValidFixture
{
    /**
     * @return array
     */
    public static function getFixtures()
    {
        return self::$fixtures;
    }

    private static $fixtures = [
        ["http://✪df.ws/123"],
        ["http://userid:password@example.com:8080"],
        ["http://userid:password@example.com:8080/"],
        ["http://userid@example.com"],
        ["http://userid@example.com/"],
        ["http://userid@example.com:8080"],
        ["http://userid@example.com:8080/"],
        ["http://userid:password@example.com"],
        ["http://userid:password@example.com/"],
        ["http://142.42.1.1/"],
        ["http://142.42.1.1:8080/"],
        ["http://➡.ws/䨹"],
        ["http://⌘.ws"],
        ["http://⌘.ws/"],
        ["http://foo.com/blah_(wikipedia)#cite-1"],
        ["http://foo.com/blah_(wikipedia)_blah#cite-1"],
        ["http://foo.com/unicode_(✪)_in_parens"],
        ["http://foo.com/(something)?after=parens"],
        ["http://foo.com/(something)?after=parens&ddd=ssk&i=22;uu=1&mck="],
        ["http://☺.damowmow.com/"],
        ["http://code.google.com/events/#&product=browser"],
        ["http://j.mp"],
        ["ftp://foo.bar/baz"],
        ["http://foo.bar/?q=Test%20URL-encoded%20stuff"],
        ["http://مثال.إختبار"],
        ["http://例子.测试"],
    ];
}
