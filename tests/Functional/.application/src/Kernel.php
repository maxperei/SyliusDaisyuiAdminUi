<?php

declare(strict_types=1);

namespace TestApplication\Sylius\DaisyuiAdminUi;

use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Sylius\AdminUi\Symfony\SyliusAdminUiBundle;
use Sylius\DaisyuiAdminUi\Symfony\SyliusDaisyuiAdminUiBundle;
use Sylius\TwigExtra\Symfony\SyliusTwigExtraBundle;
use Sylius\TwigHooks\SyliusTwigHooksBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Bundle\SecurityBundle\SecurityBundle;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\UX\Icons\UXIconsBundle;
use Symfony\UX\TwigComponent\TwigComponentBundle;
use TalesFromADev\Twig\Extra\Tailwind\Bridge\Symfony\Bundle\TalesFromADevTwigExtraTailwindBundle;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function getProjectDir(): string
    {
        return dirname(__DIR__);
    }

    public function registerBundles(): iterable
    {
        yield new DoctrineBundle();
        yield new SecurityBundle();
        yield new FrameworkBundle();
        yield new TwigBundle();
        yield new TwigComponentBundle();
        yield new UXIconsBundle();
        yield new SyliusTwigHooksBundle();
        yield new SyliusTwigExtraBundle();
        yield new TalesFromADevTwigExtraTailwindBundle();
        yield new SyliusAdminUiBundle();
        yield new SyliusDaisyuiAdminUiBundle();
    }
}
