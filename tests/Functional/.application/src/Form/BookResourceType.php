<?php

declare(strict_types=1);

namespace TestApplication\Sylius\DaisyuiAdminUi\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TestApplication\Sylius\DaisyuiAdminUi\Resource\BookResource;

final class BookResourceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BookResource::class,
        ]);
    }
}