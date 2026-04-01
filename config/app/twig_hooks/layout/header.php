<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $container): void {
    $container->extension('sylius_twig_hooks', [
        'hooks' => [
            'sylius_admin.common.component.header' => [
                'menu' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/crud/common/header/menu.html.twig',
                ],
                'items' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/crud/common/header/items.html.twig',
                ],
            ],
            'sylius_admin.common.component.header.items' => [
                'user' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/crud/common/header/items/user.html.twig',
                ]
            ],
        ]
    ]);
};