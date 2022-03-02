<?php

namespace App\Form;

use App\Entity\Hackathon;
use App\Entity\Inscription;
use App\Entity\Participant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriptionHackatFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('texte')  
                 
            // ->add('idparticipant',
            // EntityType::class,
            //     array(
            //         'class' => Participant::class,
            //         'choice_label' =>'ville',
            //         'multiple' => false
            //     )
            //     )
            // ->add('idhackathon',
            // EntityType::class,
            //     array(
            //         'class' => Hackathon::class,
            //         'choice_label' =>'ville',
            //         'multiple' => false
            //     )
            //     )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Inscription::class,
        ]);
    }
}
