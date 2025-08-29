<?php

namespace App\Form;

use App\Entity\AlerteQualite;
use App\Entity\EvaluationJour;
use App\Entity\Formation;
use App\Entity\Stagiaire;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlerteTriType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', null, [
                'widget' => 'single_text',
            ])
            ->add('titre')
            ->add('description')
            ->add('lu')
            ->add('stagiaire', EntityType::class, [
                'class' => Stagiaire::class,
                'choice_label' => 'id',
            ])
            ->add('evaluationJour', EntityType::class, [
                'class' => EvaluationJour::class,
                'choice_label' => 'id',
            ])
            ->add('formation', EntityType::class, [
                'class' => Formation::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AlerteQualite::class,
        ]);
    }
}
