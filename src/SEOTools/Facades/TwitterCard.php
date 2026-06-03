<?php

namespace Apriil\SEOTools\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * TwitterCard is a facade for the `TwitterCards` implementation access.
 *
 * @see \Apriil\SEOTools\Contracts\TwitterCards
 *
 * @method static string generate(bool $minify = false)
 * @method static \Apriil\SEOTools\Contracts\TwitterCards addValue(string $key, array|string $value)
 * @method static \Apriil\SEOTools\Contracts\TwitterCards setType(string $type)
 * @method static \Apriil\SEOTools\Contracts\TwitterCards setTitle(string $title)
 * @method static \Apriil\SEOTools\Contracts\TwitterCards setSite(string $site)
 * @method static \Apriil\SEOTools\Contracts\TwitterCards setDescription(string $description)
 * @method static \Apriil\SEOTools\Contracts\TwitterCards setUrl(string $url)
 * @method static \Apriil\SEOTools\Contracts\TwitterCards addImage(string|array $image)
 * @method static \Apriil\SEOTools\Contracts\TwitterCards setImages(array $images)
 */
class TwitterCard extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'seotools.twitter';
    }
}
