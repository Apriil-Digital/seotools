<?php

namespace Apriil\SEOTools\Traits;

use Apriil\SEOTools\Contracts\SEOFriendly;

trait SEOTools
{
    /**
     * @return \Apriil\SEOTools\Contracts\SEOTools
     */
    protected function seo()
    {
        return app('seotools');
    }

    /**
     * @param SEOFriendly $friendly
     *
     * @return \Apriil\SEOTools\Contracts\SEOTools
     */
    protected function loadSEO(SEOFriendly $friendly)
    {
        $SEO = $this->seo();

        $friendly->loadSEO($SEO);

        return $SEO;
    }
}
