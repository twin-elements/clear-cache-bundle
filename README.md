# clear-cache-bundle
Clear cache functions for CMS Jellinek

Install: composer require twin-elements/clear-cache-bundle

Add in /config/routes.yaml

te_clear_cache:
    resource: "@TEClearCacheBundle/Controller/ClearCacheController.php"
    type:     annotation
    prefix: /admin/cache
    
Add in /config/bundles.php

TwinElements\ClearCacheBundle\TEClearCacheBundle::class => ['all' => true]
