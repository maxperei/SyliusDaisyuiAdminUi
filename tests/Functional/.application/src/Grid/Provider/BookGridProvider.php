<?php

declare(strict_types=1);

namespace TestApplication\Sylius\DaisyuiAdminUi\Grid\Provider;

use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;
use Sylius\Component\Grid\Data\DataProviderInterface;
use Sylius\Component\Grid\Definition\Grid;
use Sylius\Component\Grid\Parameters;
use TestApplication\Sylius\DaisyuiAdminUi\Resource\BookResource;

class BookGridProvider implements DataProviderInterface
{
    public function getData(Grid $grid, Parameters $parameters): Pagerfanta
    {
        return new Pagerfanta(new ArrayAdapter([
            new BookResource('the-shining', 'The Shining'),
            new BookResource('carrie', 'Carrie'),
        ]));
    }
}