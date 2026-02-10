<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container): void {
    $container->extension('sylius_twig_hooks', [
        'hooks' => [
            'sylius_admin.security.login' => [
                'theme_switch' => [
                    'priority' => 10,
                    'template' => '@SyliusDaisyuiAdminUi/security/common/theme_switch.html.twig',
                ],
                'page' => [
                    'template' => '@SyliusDaisyuiAdminUi/security/common/page.html.twig',
                ],
            ],

            'sylius_admin.security.login.page' => [
                'logo' => [
                    'template' => '@SyliusDaisyuiAdminUi/security/common/logo.html.twig',
                ],
                'content' => [
                    'template' => '@SyliusDaisyuiAdminUi/security/common/content.html.twig',
                ],
            ],

            'sylius_admin.security.login.page.logo' => [
                'image' => [
                    'template' => '@SyliusDaisyuiAdminUi/security/common/logo/image.html.twig',
                ],
            ],

            'sylius_admin.security.login.page.content' => [
                'header' => [
                    'template' => '@SyliusDaisyuiAdminUi/security/common/content/header.html.twig',
                ],
                'flashes' => [
                    'template' => '@SyliusDaisyuiAdminUi/shared/crud/common/content/flashes.html.twig',
                ],
                'form' => [
                    'template' => '@SyliusDaisyuiAdminUi/security/login/page/content/form.html.twig',
                ],
            ],

            'sylius_admin.security.login.page.content.form' => [
                'error' => [
                    'template' => '@SyliusDaisyuiAdminUi/security/login/page/content/form/error.html.twig',
                ],
                'username' => [
                    'template' => '@SyliusDaisyuiAdminUi/security/login/page/content/form/username.html.twig',
                ],
                'password' => [
                    'template' => '@SyliusDaisyuiAdminUi/security/login/page/content/form/password.html.twig',
                ],
                'remember_me' => [
                    'template' => '@SyliusDaisyuiAdminUi/security/login/page/content/form/remember_me.html.twig',
                ],
                'submit' => [
                    'template' => '@SyliusDaisyuiAdminUi/security/login/page/content/form/submit.html.twig',
                ],
            ],
        ],
    ]);
};
