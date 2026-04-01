<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container): void {
    $container->extension('sylius_twig_hooks', [
        'hooks' => [
            'sylius_admin.common.component.aside.brand' => [
                'link' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/crud/common/aside/brand/link.html.twig',
                ],
            ],
            'sylius_admin.common.component.aside.logo' => [
                'image' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/crud/common/aside/logo/image.html.twig',
                ],
            ],
            'sylius_admin.common.component.aside' => [
                'navbar' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/crud/common/aside/navbar.html.twig',
                ],
                'sidebar' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/crud/common/aside/sidebar.html.twig',
                ],
            ],
            'sylius_admin.common.component.aside.navbar' => [
                'brand' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/crud/common/aside/navbar/brand.html.twig',
                ],
                'toggle_button' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/crud/common/aside/navbar/toggle_button.html.twig',
                ],
            ],
            'sylius_admin.common.component.aside.sidebar' => [
                'brand' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/crud/common/aside/sidebar/brand.html.twig',
                ],
                'menu' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/crud/common/aside/sidebar/menu.html.twig',
                ]
            ],
        ],
    ]);
};