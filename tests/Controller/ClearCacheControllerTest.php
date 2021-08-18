<?php

namespace TwinElements\ClearCacheBundle\Tests\Controller;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\HttpKernelBrowser;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\RouteCollectionBuilder;
use TwinElements\ClearCacheBundle\TwinElementsClearCacheBundle;

class ClearCacheControllerTest extends TestCase
{
    public function testClear()
    {
        $kernel = new ClearCacheControllerKernel();
        $client = new HttpKernelBrowser($kernel);
        $client->request('GET', '/admin/cache/clear');
        var_dump($client->getResponse()->getContent());
        $this->assertSame(200, $client->getResponse()->getStatusCode());
    }
}

class ClearCacheControllerKernel extends Kernel
{
    use MicroKernelTrait;

    public function __construct()
    {
        var_dump('ok');
        parent::__construct('test', true);
    }

    public function registerBundles()
    {
        return [
            new TwinElementsClearCacheBundle(),
            new FrameworkBundle()
        ];
    }

    public function getCacheDir()
    {
        return __DIR__ . '/../cache/' . spl_object_hash($this);
    }

    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        $routes->import(__DIR__ . '/../../src/Controller/ClearCacheController.php', '/admin/cache/', 'annotation');
    }

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        $c->loadFromExtension('framework', [
            'secret' => 'F00'
        ]);
    }
}
