<?php

declare(strict_types=1);

namespace Tests\Sylius\DaisyuiAdminUi\Functional;

use Symfony\Component\Panther\Client as PantherClient;
use Symfony\Component\Panther\PantherTestCase;

class DashboardPageTest extends PantherTestCase
{
    private PantherClient $client;

    protected function setUp(): void
    {
        $this->client = static::createPantherClient();
    }

    public function testDashboardTemplate(): void
    {
        $this->client->request('GET', '/admin/');

        self::assertPageTitleSame('Sylius DaisyUI Admin UI | Dashboard');
    }

    public function testImportmapEntrypointIsLoaded(): void
    {
        $this->client->request('GET', '/admin/');
        $crawler = $this->client->getCrawler();
        $importmap = $crawler->filter('head script[type="importmap"]');

        self::assertCount(1, $importmap);
        self::assertStringContainsString('"sylius/daisyuiadminui"', $this->client->getPageSource());
        self::assertStringContainsString('"@symfony/stimulus-bundle"', $this->client->getPageSource());
        self::assertStringContainsString('"stimulus-use"', $this->client->getPageSource());
    }

    public function testDashboardDrawerSidebar(): void
    {
        $this->client->request('GET', '/admin/');
        self::assertSelectorTextContains('details.collapse summary.collapse-title', 'app.menu.library');

        $this->client->getCrawler()->filter('details.collapse summary.collapse-title')->click();
        self::assertSelectorIsVisible('details.collapse div.collapse-content a.collapse-item');
        self::assertSelectorTextContains('details.collapse div.collapse-content a.collapse-item', 'app.ui.books');

        $this->client->getCrawler()->filter('[data-controller="sylius--daisyui-admin-ui--menu-search"] input')->sendKeys('dashboard');
        self::assertSelectorIsNotVisible('details.collapse summary.collapse-title');
        self::assertSelectorIsVisible('.nav-link');
        self::assertSelectorIsVisible('[data-sylius--daisyui-admin-ui--menu-search-target="close"]');

        $this->client->getCrawler()->filter('[data-sylius--daisyui-admin-ui--menu-search-target="close"]')->click();

        $this->client->getCrawler()->filter('[data-controller="sylius--daisyui-admin-ui--menu-search"] input')->sendKeys('books');
        self::assertSelectorIsVisible('details.collapse summary.collapse-title');
        self::assertSelectorIsNotVisible('.nav-link');
    }
}
