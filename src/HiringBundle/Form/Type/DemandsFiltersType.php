<?php
declare(strict_types=1);

namespace HiringBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandsFiltersType extends AbstractType
{
/**
     * {@inheritDoc}
     */
    public function getBlockPrefix()
    {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('min_date', DateType::class, [
                'widget'      => 'single_text',
                'format'      => 'dd.MM.yyyy',
                'required'    => false,
            ])
            ->add('max_date', DateType::class, [
                'widget'      => 'single_text',
                'format'      => 'dd.MM.yyyy',
                'required'    => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => false,
            'method' => 'get',
            'allow_extra_fields' => true
        ]);

        parent::configureOptions($resolver);
    }
}
