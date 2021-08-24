<?php

namespace TwinElements\ClearCacheBundle\Menu;

use TwinElements\AdminBundle\Menu\AdminMenuInterface;
use TwinElements\AdminBundle\Menu\MenuItem;
use TwinElements\AdminBundle\Role\AdminUserRole;

class AdminMenu implements AdminMenuInterface
{
    public function getItems()
    {
        return [
            MenuItem::newInstance('te_clear_cache.clear_website_cache', 'te_clear_cache', [], 150, AdminUserRole::ROLE_ADMIN),
        ];
    }
}
