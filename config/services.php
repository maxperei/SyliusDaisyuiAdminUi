<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $configurator): void {
    $configurator->import('./services/**/**.php');

    $services = $configurator->services();

    $services
        ->defaults()
        ->autowire()
        ->autoconfigure()
    ;
    $services->load('Sylius\\DaisyuiAdminUi\\Symfony\\', '../src/Symfony');
};
