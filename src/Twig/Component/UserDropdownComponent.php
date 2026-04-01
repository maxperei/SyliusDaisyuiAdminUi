<?php

declare(strict_types=1);

namespace Sylius\DaisyuiAdminUi\Twig\Component;

use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent]
class UserDropdownComponent
{
    public function __construct(
        private readonly array $routing,
        private TokenStorageInterface $tokenStorage,
        private RouterInterface $router,
    ) {
    }

    #[ExposeInTemplate('user')]
    public function getUser(): ?UserInterface
    {
        return $this->tokenStorage->getToken()?->getUser();
    }

    /**
     * @return array<array-key, array{title?: string, url?: string, icon?: string, type?: string, class?: string}>
     */
    #[ExposeInTemplate('menu_items')]
    public function getMenuItems(): array
    {
        return [
            [
                'title' => 'sylius.ui.logout',
                'url' => $this->routing['logout_path'] ?? $this->router->generate('sylius_admin_ui_logout'),
                'icon' => 'tabler:logout',
            ],
        ];
    }
}