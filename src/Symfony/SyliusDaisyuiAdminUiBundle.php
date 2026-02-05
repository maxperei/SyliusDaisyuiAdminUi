<?php

namespace Sylius\DaisyuiAdminUi\Symfony;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class SyliusDaisyuiAdminUiBundle extends AbstractBundle
{
    public function getPath(): string
    {
        if (!isset($this->path)) {
            $reflected = new \ReflectionObject($this);
            $this->path = \dirname($reflected->getFileName(), 3);
        }

        return $this->path;
    }

    public function prependExtension(ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $bundles = $builder->getParameter('kernel.bundles');

        $loader = new PhpFileLoader(
            $builder,
            new FileLocator(dirname(__DIR__, 2) . '/config'),
        );

        $loader->load('services.php');

        if (!isset($bundles['SyliusAdminUiBundle'])) {
            return;
        }

        $container->extension('sylius_twig_hooks', [
            'enable_autoprefixing' => true,
            'hook_name_section_separator' => '#',
        ]);
    }
}
