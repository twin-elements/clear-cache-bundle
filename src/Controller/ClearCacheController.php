<?php


namespace TwinElements\ClearCacheBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Annotation\Route;
use TwinElements\Components\Flashes\Flashes;

class ClearCacheController extends AbstractController
{
    /**
     * @Route("/clear", name="te_clear_cache", methods={"GET"})
     */
    public function clear(KernelInterface $kernel, Request $request, Flashes $flashes)
    {
        try {
            $env = $kernel->getEnvironment();

            $app = new Application($kernel);
            $app->setAutoExit(false);

            $input = new ArrayInput([
                'command' => 'cache:clear',
                '--no-warmup' => true,
                '--env' => $env
            ]);

            $output = new BufferedOutput();
            $app->run($input, $output);

            $content = $output->fetch();
            $flashes->successMessage($content);

        } catch (\Exception $exception) {
            $flashes->errorMessage($exception->getMessage());
        }

        if($request->headers->get('referer')){
            $redirectUrl = $request->headers->get('referer');
        }else{
            $redirectUrl = $this->generateUrl('dashboard');
        }

        return $this->redirect($redirectUrl);
    }
}
