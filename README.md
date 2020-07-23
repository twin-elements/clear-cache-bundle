in composer.json add

```
"repositories": [
     {
       "type": "vcs",
       "url": "https://JellinekRepo@bitbucket.org/JellinekRepo/clear-cache-bundle.git"
     }
   ]
```

composer require twin-elements/clear-cache-bundle:dev-master


in /config/routes.yaml add
```
te_clear_cache:
    resource: "@TEClearCacheBundle/Controller/ClearCacheController.php"
    type:     annotation
    prefix: /admin/cache
```
    
    
in /config/bundles.php add
```    
TwinElements\ClearCacheBundle\TEClearCacheBundle::class => ['all' => true]
```
