<?php

namespace App\Form;

use App\Entity\Candidate;
use App\Entity\Demand;
use App\Entity\Voter;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('image')
            ->add('programme')
            ->add('email')
            ->add('password')
            ->add('phone')
            ->add('voter', EntityType::class, [
                'class' => Voter::class,
                'choice_label' => 'id',
            ])
            ->add('candidate', EntityType::class, [
                'class' => Candidate::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Demand::class,
        ]);
    }
}
