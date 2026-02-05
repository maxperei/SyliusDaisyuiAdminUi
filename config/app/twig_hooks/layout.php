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
            /* @todo: unified webpack encore config (or keep tailwindcli?) */
            'sylius_admin.base#stylesheets' => [
                'stylesheets' => [
                    'enabled' => false,
                ],
            ],
            'sylius_admin.base#importmap' => [
                'importmap' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/layout/importmap.html.twig',
                ],
            ],
            /* @todo: unified webpack encore config (or create a terser one?) */
            'sylius_admin.base#javascripts' => [
                'javascripts' => [
                    'enabled' => false,
                ],
            ],
        ],
    ]);
};
