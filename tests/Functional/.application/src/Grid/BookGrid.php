<?php

declare(strict_types=1);

namespace TestApplication\Sylius\DaisyuiAdminUi\Grid;

use Sylius\Bundle\GridBundle\Builder\Action\CreateAction;
use Sylius\Bundle\GridBundle\Builder\Action\UpdateAction;
use Sylius\Bundle\GridBundle\Builder\ActionGroup\ItemActionGroup;
use Sylius\Bundle\GridBundle\Builder\ActionGroup\MainActionGroup;
use Sylius\Bundle\GridBundle\Builder\Field\StringField;
use Sylius\Bundle\GridBundle\Builder\GridBuilderInterface;
use Sylius\Bundle\GridBundle\Grid\AbstractGrid;
use Sylius\Bundle\GridBundle\Grid\ResourceAwareGridInterface;
use TestApplication\Sylius\DaisyuiAdminUi\Grid\Provider\BookGridProvider;
use TestApplication\Sylius\DaisyuiAdminUi\Resource\BookResource;

final class BookGrid extends AbstractGrid implements ResourceAwareGridInterface
{
    public static function getName(): string
    {
        return 'app_book';
    }

    public function buildGrid(GridBuilderInterface $gridBuilder): void
    {
        $gridBuilder
            ->setProvider(BookGridProvider::class)
            ->addField(
                StringField::create('name')
                    ->setLabel('Name'),
            )
            ->addActionGroup(
                MainActionGroup::create(
                    CreateAction::create(),
                ),
            )
            ->addActionGroup(
                ItemActionGroup::create(
                    UpdateAction::create(),
                ),
            )
        ;
    }

    public function getResourceClass(): string
    {
        return BookResource::class;
    }
}