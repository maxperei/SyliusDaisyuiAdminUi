<?php

declare(strict_types=1);

namespace TestApplication\Sylius\DaisyuiAdminUi\Menu;

use Knp\Menu\ItemInterface;
use Sylius\AdminUi\Knp\Menu\MenuBuilderInterface;
use Symfony\Component\DependencyInjection\Attribute\AsDecorator;

#[AsDecorator(decorates: 'sylius_admin_ui.knp.menu_builder')]
final class AdminMenuBuilder implements MenuBuilderInterface
{
    public function __construct(private MenuBuilderInterface $menuBuilder)
    {
    }

    public function createMenu(array $options): ItemInterface
    {
        $menu = $this->menuBuilder->createMenu($options);

        $menu
            ->addChild('dashboard', [
                'route' => 'sylius_admin_ui_dashboard',
            ])
            ->setLabel('Dashboard')
            ->setLabelAttribute('icon', 'tabler:dashboard')
        ;

        $this->addLibrarySubMenu($menu);

        return $menu;
    }

    private function addLibrarySubMenu(ItemInterface $menu): void
    {
        $library = $menu
            ->addChild('library')
            ->setLabel('Library')
            ->setLabelAttribute('icon', 'tabler:books')
            ->setExtra('translation_domain', 'menu')
        ;

        $library->addChild('books', ['route' => 'app_book_index'])
            ->setLabel('Books')
            ->setLabelAttribute('icon', 'book')
        ;
    }
}