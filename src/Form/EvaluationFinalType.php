<?php

namespace App\Form;

use App\Entity\EvaluationFinal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvaluationFinalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('accueil', HiddenType::class, [
                'required' => true,
            ])
            ->add('salle', HiddenType::class, [
                'required' => true,
            ])
            ->add('equipements', HiddenType::class, [
                'required' => true,
            ])
            ->add('repas', HiddenType::class, [
                'required' => true,
            ])
            ->add('contenuDeLaFormation', HiddenType::class, [
                'required' => true,
            ])
            ->add('recommandation', ChoiceType::class, [
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('pedagogie', HiddenType::class, [
                'required' => true,
            ])
            ->add('maitriseDuDomaine', HiddenType::class, [
                'required' => true,
            ])
            ->add('disponibilite', HiddenType::class, [
                'required' => true,
            ])
            ->add('reponsesAuxQuestions', HiddenType::class, [
                'required' => true,
            ])
            ->add('techniquesDanimations', HiddenType::class, [
                'label' => 'Techniques d\'animations',
                'required' => true,
            ])
            ->add('autresProjets', ChoiceType::class, [
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => true,
            ])
            ->add('satisfactionGeneral', HiddenType::class, [
                'required' => true,
            ])
            ->add('avisFinal', TextareaType::class, [
                'required' => true,
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Envoyer l\'évaluation',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EvaluationFinal::class,
        ]);
    }
}
