<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Sylius\DaisyuiAdminUi\Twig\Component\UserDropdownComponent;

return static function (ContainerConfigurator $configurator): void {
    $services = $configurator->services();

    $services->set('sylius_daisyui_admin_ui.twig.component.header.user_dropdown', UserDropdownComponent::class)
        ->public()
        ->args([
            param('sylius_admin_ui.routing'),
            service('security.token_storage'),
            service('router'),
        ])
        ->tag('twig.component', [
            'key' => 'sylius_daisyui_admin_ui:header:user_dropdown',
            'template' => '@SyliusDaisyuiAdminUi/shared/components/header/user.html.twig'
        ])
    ;
};