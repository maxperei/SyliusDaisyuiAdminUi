# SyliusDaisyuiAdminUi Installation Guide

A Symfony bundle providing a modern admin UI built with DaisyUI for Sylius applications using AssetMapper.

## Overview

**SyliusDaisyuiAdminUi** is a Symfony UX bundle that integrates DaisyUI components into your Sylius admin interface. It's designed to work seamlessly with Symfony's AssetMapper for efficient asset management in Symfony 7.4+.

## Prerequisites

- **Symfony 6.4+**
- **PHP 8.1+**
- **AssetMapper** enabled in your Symfony application
- **Tailwind CSS** configured (v4.1.11 or compatible version)

## Installation Steps

### 1. Add the Bundle to Your Project

If not already installed via composer, add the bundle:

```shell script
composer require sylius/daisyui-admin-ui
```


### 2. Enable the Bundle

Register the bundle in your `config/bundles.php`:

```php
Sylius\DaisyuiAdminUi\Symfony\SyliusDaisyuiAdminUiBundle::class => ['all' => true],
```


### 3. Import Bundle Configuration

Add the bundle's configuration to a new `config/packages/sylius_daisyui_admin_ui.yaml` configuration file:

```yaml
imports:
    - { resource: '@SyliusDaisyuiAdminUiBundle/config/app.php' }
```


### 4. Configure AssetMapper Paths

Update your `config/packages/framework.yaml` to include the bundle's assets in the asset mapper paths:

```yaml
framework:
    asset_mapper:
        paths:
            - assets/ # default path
            - vendor/sylius/daisyui-admin-ui/assets/
```


### 5. Configure Tailwind CSS

Update your `config/packages/symfonycasts_tailwind.yaml` to include the bundle's stylesheet:

```yaml
symfonycasts_tailwind:
    binary_version: 'v4.1.11'
    input_css:
        - assets/styles/app.css # default path
        - vendor/sylius/daisyui-admin-ui/assets/styles/syliusdaisyuiadminui.css
```


### 6. Register Assets with ImportMap

Update your `importmap.php` configuration file to register the DaisyUI library and its entrypoint:

```php
'sylius/daisyuiadminui' => [
    'path' => './vendor/sylius/daisyui-admin-ui/assets/syliusdaisyuiadminui.js',
    'entrypoint' => true,
],
'daisyui' => [
    'version' => '5.5.17',
],
'daisyui/daisyui.min.css' => [
    'version' => '5.5.17',
    'type' => 'css',
],
```


### 7. Included in your templates

An importmap entry is already set as default asset management:

```twig
{{ importmap('sylius/daisyuiadminui') }}
```

But, it is still overridable in your base configuration:

```yaml
sylius_twig_hooks:
    hooks:
        'sylius_admin.base#importmap':
            importmap:
                template: 'importmap.html.twig' # located in %project_dir%/templates
```

However, you can also include the stylesheet instead of the entrypoint:
```yaml
sylius_twig_hooks:
    hooks:
        'sylius_admin.base#importmap':
            importmap:
                enabled: false
        'sylius_admin.base#stylesheets':
            styles:
                enabled: true
                template: '@SyliusDaisyuiAdminUi/shared/layout/stylesheets.html.twig' # redefine the default template
```

### 8. Building Assets

Build your assets using your configured asset build process:

```shell script
# For development
bin/console tailwind:build vendor/sylius/daisyui-admin-ui/assets/styles/syliusdaisyuiadminui.css

# For production
php bin/console asset-map:compile
```


## Verification

After installation, verify that:

1. ✅ The bundle is registered in `config/bundles.php`
2. ✅ AssetMapper paths include the bundle's assets directory
3. ✅ Tailwind CSS configuration includes the bundle's stylesheet
4. ✅ ImportMap is configured with DaisyUI dependencies and entrypoint
5. ✅ The `importmap` helper is called in your base template
6. ✅ Bundle styles are built using tailwindcss standalone cli into `var/tailwind/syliusdaisyuiadminui.built.css`


## Troubleshooting

### Assets not loading
- Ensure `framework.asset_mapper.paths` includes `vendor/sylius/daisyui-admin-ui/assets/`
- Clear the cache: `php bin/console cache:clear`

### Styles not applied
- Verify Tailwind CSS is configured to process the bundle's stylesheets
- Check that `symfonycasts_tailwind.input_css` includes the bundle's CSS file

### Components not rendering
- Confirm the importmap includes all required DaisyUI dependencies
- Verify the importmap helper is called in your base template

## Resources

- [DaisyUI Documentation](https://daisyui.com/)
- [Symfony AssetMapper Documentation](https://symfony.com/doc/current/frontend/asset_mapper.html)
- [Sylius Documentation](https://docs.sylius.com/)
