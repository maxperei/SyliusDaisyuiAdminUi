<?php

declare(strict_types=1);

namespace Sylius\DaisyuiAdminUi\Symfony\Controller;

use Sylius\AdminUi\Symfony\Controller\LoginController as DecoratedLoginController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\AsDecorator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[AsDecorator(decorates: 'sylius_admin_ui.controller.login')]
#[Route('/admin')]
final class LoginController extends AbstractController
{
    public function __construct(private readonly DecoratedLoginController $decorated)
    {
    }

    #[Route('/login')]
    public function __invoke(
        Request $request,
        ?string $formType = null,
        ?string $template = null
    ): Response {
        $template ??= '@SyliusDaisyuiAdminUi/security/login.html.twig';
        return $this->decorated->__invoke($request, $formType, $template);
    }
}
