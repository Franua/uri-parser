<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Tests\Fixture\UriInvalidFixture;
use Tests\Fixture\UriValidFixture;
use UriParser\Domain\Input\UriInput;

class UriInputTest extends TestCase
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
     */
    public function testIsValidReturnsTrueForValidUris(string $uri)
    {
        $uriInput = new UriInput($uri);
        $this->assertTrue($uriInput->isValid());
    }

    /**
     * @dataProvider invalidUriFixtures
     * @param string $uri
     */
    public function testIsValidReturnsFalseForInvalidUris(string $uri)
    {
        $uriInput = new UriInput($uri);
        $this->assertFalse($uriInput->isValid());
    }
}
