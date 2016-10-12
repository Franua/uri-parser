<?php

namespace Tests;

use Tests\Fixture\UriInvalidFixture;
use Tests\Fixture\UriValidFixture;
use UriParser\Domain\Input\UriInput;
use UriParser\Domain\Service\UriParserService;
use UriParser\Domain\Value\UriValue;

class UriParserServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public function validUriFixtures() : array
    {
        return UriValidFixture::getFixtures();
    }

    /**
     * @return array
     */
    public function invalidUriFixtures() : array
    {
        return UriInvalidFixture::getFixtures();
    }

    /**
     * @dataProvider validUriFixtures
     * @param string $uri
     * @s
     */
    public function testParseReturnsValidUriValue(string $uri)
    {
        $uriValue = (new UriParserService())->parse(new UriInput($uri));

        $this->assertInstanceOf(UriValue::class, $uriValue);
        $this->assertTrue($uriValue->isValid());
        $this->assertSame($uri, (string) $uriValue);
        $this->assertSame($uri, $uriValue->buildUri());
    }

    /**
     * @dataProvider invalidUriFixtures
     * @param string $uri
     */
    public function testParseReturnsMalformedUriValue(string $uri)
    {
        $uriValue = (new UriParserService())->parse(new UriInput($uri));

        $this->assertInstanceOf(UriValue::class, $uriValue);
        $this->assertFalse($uriValue->isValid());
        $this->assertSame($uri, (string) $uriValue);
        $this->assertSame('', $uriValue->buildUri());
    }
}
