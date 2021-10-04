<?php

namespace App\Form;

use App\Entity\ProtocolEntry;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProtocolEntryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'date',
                DateType::class, [
                    'widget' => 'single_text',
                    'html5' => true,
                ]
            )
            ->add('disturbanceType')
            ->add(
                'startTime',
                  TimeType::class, [
                      'widget' => 'single_text',
                      'html5' => true,
                ]
            )
            ->add(
                'endTime',
                  TimeType::class, [
                      'widget' => 'single_text',
                      'html5' => true,
                  ]
            )
            ->add('description')
            ->add('witness')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProtocolEntry::class,
        ]);
    }
}
