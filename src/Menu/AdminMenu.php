<?php

namespace TwinElements\ClearCacheBundle\Menu;

use TwinElements\AdminBundle\Menu\AdminMenuInterface;

class AdminMenu implements AdminMenuInterface
{
    public function getItems()
    {
        return [
            MenuItem::newInstance('te_clear_cache.clear_website_cache', 'te_clear_cache', [], 150, AdminUserRole::ROLE_ADMIN),
        ];
    }
}
