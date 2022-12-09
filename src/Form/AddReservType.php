<?php

namespace App\Form;

use App\Entity\Park;
use App\Entity\Reservation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use function Symfony\Bridge\Twig\Extension\twig_is_selected_choice;

class AddReservType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('phone')
            ->add('name')
            ->add('periode', ChoiceType::class, [
                'choices'  => [
                    'Jour' => 'Jour',
                    'Nuit' => 'Nuit',
                ],
            ])
            ->add('park',EntityType::class,
                [
                    'class'=>Park::class,
                    'multiple'=>false,
//                    'choice_label'=>'adresse'
                ]
            );




    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
