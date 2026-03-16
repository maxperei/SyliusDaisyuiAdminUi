<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container): void {
    $container->extension('sylius_twig_hooks', [
        'hooks' => [
            'sylius_admin.common.component.drawer.brand' => [
                'link' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/crud/common/drawer/brand/link.html.twig',
                ],
            ],
            'sylius_admin.common.component.drawer.logo' => [
                'image' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/crud/common/drawer/logo/image.html.twig',
                ],
            ],
            'sylius_admin.common.component.drawer' => [
                'navbar' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/crud/common/drawer/navbar.html.twig',
                ],
                'sidebar' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/crud/common/drawer/sidebar.html.twig',
                ],
//                'menu' => [
//                    'template' => '@SyliusDaisyuiAdminUi/shared/crud/common/sidebar/menu.html.twig',
//                ]
            ],
            'sylius_admin.common.component.drawer.navbar' => [
                'brand' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/crud/common/drawer/navbar/brand.html.twig',
                ],
                'toggle_button' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/crud/common/drawer/navbar/toggle_button.html.twig',
                ],
            ],
            'sylius_admin.common.component.drawer.sidebar' => [
                'brand' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/crud/common/drawer/sidebar/brand.html.twig',
                ],
            ],
        ],
    ]);
};