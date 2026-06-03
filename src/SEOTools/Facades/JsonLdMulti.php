<?php

namespace Apriil\SEOTools\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * JsonLd is a facade for the `JsonLd` implementation access.
 *
 * @see \Apriil\SEOTools\Contracts\JsonLdMulti
 * @method static string generate(bool $minify = false)
 * @method static \Apriil\SEOTools\Contracts\JsonLdMulti newJsonLd()
 * @method static \Apriil\SEOTools\Contracts\JsonLdMulti isEmpty()
 * @method static \Apriil\SEOTools\Contracts\JsonLdMulti select(int $index)
 * @method static \Apriil\SEOTools\Contracts\JsonLdMulti addValue(string $key, array|string $value)
 * @method static \Apriil\SEOTools\Contracts\JsonLdMulti setType(string $type)
 * @method static \Apriil\SEOTools\Contracts\JsonLdMulti setName(string $name)
 * @method static \Apriil\SEOTools\Contracts\JsonLdMulti setTitle(string $title)
 * @method static \Apriil\SEOTools\Contracts\JsonLdMulti setSite(string $site)
 * @method static \Apriil\SEOTools\Contracts\JsonLdMulti setDescription(string $description)
 * @method static \Apriil\SEOTools\Contracts\JsonLdMulti setUrl(string $url)
 * @method static \Apriil\SEOTools\Contracts\JsonLdMulti addImage(array|string $image)
 * @method static \Apriil\SEOTools\Contracts\JsonLdMulti setImages(array $images)
 */
class JsonLdMulti extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'seotools.json-ld-multi';
    }
}
