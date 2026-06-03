<?php

namespace Apriil\SEOTools\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * SEOTools is a facade for the `SEOTools` implementation access.
 *
 * @see \Apriil\SEOTools\Contracts\SEOTools
 *
 * @method static string generate(bool $minify = false)
 * @method static \Apriil\SEOTools\Contracts\MetaTags metatags()
 * @method static \Apriil\SEOTools\Contracts\OpenGraph opengraph()
 * @method static \Apriil\SEOTools\Contracts\TwitterCards twitter()
 * @method static \Apriil\SEOTools\Contracts\JsonLd jsonLd()
 * @method static \Apriil\SEOTools\Contracts\JsonLdMulti jsonLdMulti()
 * @method static \Apriil\SEOTools\Contracts\SEOTools setTitle(string $title, bool $appendDefault = true)
 * @method static \Apriil\SEOTools\Contracts\SEOTools setDescription(string $description)
 * @method static \Apriil\SEOTools\Contracts\SEOTools setCanonical(string $url)
 * @method static \Apriil\SEOTools\Contracts\SEOTools addImages(array $urls)
 * @method static string getTitle(bool $session = false)
 */
class SEOTools extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'seotools';
    }
}
