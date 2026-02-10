<?php

declare(strict_types=1);

namespace Tests\Sylius\DaisyuiAdminUi\Functional;

use Symfony\Component\Panther\Client as PantherClient;
use Symfony\Component\Panther\PantherTestCase;

class LoginPageTest extends PantherTestCase
{
    private PantherClient $client;

    protected function setUp(): void
    {
        $this->client = static::createPantherClient();
    }

    public function testLoginTemplate(): void
    {
        $this->client->request('GET', '/admin/login');

        $this->assertSelectorAttributeContains('body', 'class', 'flex flex-column');
        $this->assertSelectorTextContains('h2.card-title', 'sylius.ui.login_to_your_account');
        $this->assertSelectorTextContains('button[type=submit]', 'sylius.ui.login');

        $this->switchThemeAndTakeScreenshots();
    }

    private function switchThemeAndTakeScreenshots(): void
    {
        $this->client->request('GET', '/admin/login');

        $this->client->takeScreenshot('screens/login-page--light.png');
        $this->client->getCrawler()->filter('label.toggle')->click();
        $this->client->takeScreenshot('screens/login-page--dark.png');
    }
}
