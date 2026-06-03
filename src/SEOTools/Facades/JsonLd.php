<?php

namespace Apriil\SEOTools\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * JsonLd is a facade for the `JsonLd` implementation access.
 *
 * @see \Apriil\SEOTools\Contracts\JsonLd
 * @method static string generate(bool $minify = false)
 * @method static bool isEmpty()
 * @method static \Apriil\SEOTools\Contracts\JsonLd addValue(string $key, array|string $value)
 * @method static \Apriil\SEOTools\Contracts\JsonLd setType(string $type)
 * @method static \Apriil\SEOTools\Contracts\JsonLd setName(string $name)
 * @method static \Apriil\SEOTools\Contracts\JsonLd setTitle(string $title)
 * @method static \Apriil\SEOTools\Contracts\JsonLd setSite(string $site)
 * @method static \Apriil\SEOTools\Contracts\JsonLd setDescription(string $description)
 * @method static \Apriil\SEOTools\Contracts\JsonLd setUrl(string $url)
 * @method static \Apriil\SEOTools\Contracts\JsonLd addImage(array|string $image)
 * @method static \Apriil\SEOTools\Contracts\JsonLd setImages(array $images)
 */
class JsonLd extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'seotools.json-ld';
    }
}
