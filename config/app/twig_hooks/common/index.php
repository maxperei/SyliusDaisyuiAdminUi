<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $configurator): void {
    $configurator->extension('sylius_twig_hooks', [
        'hooks' => [
            'sylius_admin.base#base_title' => [
                'default' => [
                    'configuration' => [
                        'title' => 'Sylius DaisyUI Admin UI | Dashboard',
                    ]
                ]
            ],
            'sylius_admin.common.index' => [
                'drawer' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/crud/common/drawer.html.twig',
                ]
            ],
        ],
    ]);
};
