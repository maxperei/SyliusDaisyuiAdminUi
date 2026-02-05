<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Sylius\DaisyuiAdminUi\Symfony\Controller\LoginController;

return function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services->set('sylius_daisyui_admin_ui.controller.login', LoginController::class)
        ->decorate('sylius_admin_ui.controller.login')
        ->args([
            service('.inner'),
        ])
    ;
};
