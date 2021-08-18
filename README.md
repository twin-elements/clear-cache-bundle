composer require twin-elements/clear-cache-bundle

`te_clear_cache:
    resource: "@TEClearCacheBundle/Controller/ClearCacheController.php"
    type:     annotation
    prefix: /admin/cache`
    
TwinElements\ClearCacheBundle\TEClearCacheBundle::class => ['all' => true]
