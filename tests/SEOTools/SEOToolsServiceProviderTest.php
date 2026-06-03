<?php

namespace Apriil\SEOTools\Tests;

use PHPUnit\Framework\Attributes\DataProvider;

/**
 * Class SEOToolsServiceProviderTest.
 */
class SEOToolsServiceProviderTest extends BaseTest
{
    /**
     * Verify if classes are in service container.
     */
    #[DataProvider('bindsListProvider')]
    public function test_container_are_provided($contract, $concreteClass)
    {
        $this->assertInstanceOf(
            $contract,
            $this->app[$concreteClass]
        );
    }

    public static function bindsListProvider()
    {
        return [
            [
                'Apriil\SEOTools\Contracts\MetaTags',
                'Apriil\SEOTools\SEOMeta',
            ],
            [
                'Apriil\SEOTools\Contracts\OpenGraph',
                'Apriil\SEOTools\OpenGraph',
            ],
            [
                'Apriil\SEOTools\Contracts\SEOTools',
                'Apriil\SEOTools\SEOTools',
            ],
            [
                'Apriil\SEOTools\Contracts\TwitterCards',
                'Apriil\SEOTools\TwitterCards',
            ],
            [
                'Apriil\SEOTools\Contracts\JsonLd',
                'Apriil\SEOTools\JsonLd',
            ],
            [
                'Apriil\SEOTools\Contracts\JsonLdMulti',
                'Apriil\SEOTools\JsonLdMulti',
            ],
        ];
    }
}
