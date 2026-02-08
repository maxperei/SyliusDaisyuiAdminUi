<?php

declare(strict_types=1);

namespace Tests\Sylius\DaisyuiAdminUi\Functional;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginPageTest extends WebTestCase
{
    private KernelBrowser $client;

    protected function setUp(): void
    {
        $this->client = self::createClient();
    }

    public function testLoginTemplate(): void
    {
        $this->client->request('GET', '/admin/login');

        $this->assertSelectorTextContains('h2.card-title', 'sylius.ui.login_to_your_account');
        $this->assertSelectorTextContains('button[type=submit]', 'sylius.ui.login');
    }
}
