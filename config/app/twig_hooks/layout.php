<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $configurator): void {
    $configurator->extension('sylius_twig_hooks', [
        'hooks' => [
            'sylius_admin.base#base_title' => [
                'default' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/layout/title.html.twig',
                ],
            ],
            'sylius_admin.base#importmap' => [
                'importmap' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/layout/importmap.html.twig',
                ],
            ],
        ],
    ]);
};
