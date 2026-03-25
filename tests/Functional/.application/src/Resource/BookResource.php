<?php

declare(strict_types=1);

namespace TestApplication\Sylius\DaisyuiAdminUi\Resource;

use Sylius\Resource\Metadata\AsResource;
use Sylius\Resource\Metadata\Index;
use Sylius\Resource\Model\ResourceInterface;
use TestApplication\Sylius\DaisyuiAdminUi\Form\BookResourceType;
use TestApplication\Sylius\DaisyuiAdminUi\Grid\BookGrid;

#[AsResource(
    formType: BookResourceType::class,
    templatesDir: '@SyliusAdminUi/crud',
    driver: false,
    operations: [
        new Index(grid: BookGrid::class),
    ],
)]
final class BookResource implements ResourceInterface
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
    ) {
    }

    public function getId(): ?string
    {
        return $this->id;
    }
}