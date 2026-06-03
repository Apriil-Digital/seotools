<?php

namespace Apriil\SEOTools\Providers;

use Apriil\SEOTools\Contracts;
use Apriil\SEOTools\JsonLd;
use Apriil\SEOTools\JsonLdMulti;
use Apriil\SEOTools\OpenGraph;
use Apriil\SEOTools\SEOMeta;
use Apriil\SEOTools\SEOTools;
use Apriil\SEOTools\TwitterCards;
use Illuminate\Config\Repository as Config;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

/**
 * SEOToolsServiceProvider bootstraps SEO tools services to the application.
 * This service provider will be automatically discovered by Laravel after this package installed.
 * For Lumen it should be registered manually at 'bootstrap/app.php'. For example:
 * ```php
 * <?php
 * // ...
 * $app = new Laravel\Lumen\Application(
 *     dirname(__DIR__)
 * );
 * // ...
 * $app->register(Apriil\SEOTools\Providers\SEOToolsServiceProvider::class);
 * // ...
 * return $app;
 * ```
 *
 * @see \Apriil\SEOTools\Contracts\SEOTools
 * @see \Apriil\SEOTools\Contracts\MetaTags
 * @see \Apriil\SEOTools\Contracts\OpenGraph
 * @see \Apriil\SEOTools\Contracts\TwitterCards
 * @see \Apriil\SEOTools\Contracts\JsonLd
 * @see \Apriil\SEOTools\Contracts\JsonLdMulti
 */
class SEOToolsServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        $configFile = __DIR__ . '/../../resources/config/seotools.php';

        if ($this->isLumen()) {
            $this->app->configure('seotools');
        } else {
            $this->publishes([
                $configFile => config_path('seotools.php'),
            ]);
        }

        $this->mergeConfigFrom($configFile, 'seotools');
        
        $this->publishes([
            __DIR__ . '/../../resources/config/seotools.php' => $this->app->configPath('seotools.php'),
        ], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('seotools.metatags', function ($app) {
            return new SEOMeta(new Config($app['config']->get('seotools.meta', [])));
        });

        $this->app->singleton('seotools.opengraph', function ($app) {
            return new OpenGraph($app['config']->get('seotools.opengraph', []));
        });

        $this->app->singleton('seotools.twitter', function ($app) {
            return new TwitterCards($app['config']->get('seotools.twitter.defaults', []));
        });

        $this->app->singleton('seotools.json-ld', function ($app) {
            return new JsonLd($app['config']->get('seotools.json-ld.defaults', []));
        });

        $this->app->singleton('seotools.json-ld-multi', function ($app) {
            return new JsonLdMulti($app['config']->get('seotools.json-ld.defaults', []));
        });

        $this->app->singleton('seotools', function () {
            return new SEOTools();
        });

        $this->app->bind(Contracts\MetaTags::class, 'seotools.metatags');
        $this->app->bind(Contracts\OpenGraph::class, 'seotools.opengraph');
        $this->app->bind(Contracts\TwitterCards::class, 'seotools.twitter');
        $this->app->bind(Contracts\JsonLd::class, 'seotools.json-ld');
        $this->app->bind(Contracts\JsonLdMulti::class, 'seotools.json-ld-multi');
        $this->app->bind(Contracts\SEOTools::class, 'seotools');
    }

    /**
     * {@inheritdoc}
     */
    public function provides()
    {
        return [
            Contracts\SEOTools::class,
            Contracts\MetaTags::class,
            Contracts\TwitterCards::class,
            Contracts\OpenGraph::class,
            Contracts\JsonLd::class,
            Contracts\JsonLdMulti::class,
            'seotools',
            'seotools.metatags',
            'seotools.opengraph',
            'seotools.twitter',
            'seotools.json-ld',
            'seotools.json-ld-multi',
        ];
    }

    /**
     * @return bool
     */
    private function isLumen(): bool
    {
        return Str::contains($this->app->version(), 'Lumen');
    }
}
