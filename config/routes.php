<?php

declare(strict_types=1);

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes): void {
    $routes->add('sylius_admin_ui_login', '/login')
        ->controller('sylius_admin_ui.controller.login')
        ->defaults([
            'template' => '@SyliusDaisyuiAdminUi/security/login.html.twig',
        ])
    ;
};
