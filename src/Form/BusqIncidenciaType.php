<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
class BusqIncidenciaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titleSearch',
                        TextType::class,
                [
                'label' => 'Título',
                    'required' => false
                ]
            )
            ->add('categorySearch',
                EntityType::class,
                [
                    'label' => 'Categoria',
                    'class' => Category::class
                ]
            )
            ->add('submit',
                SubmitType::class,
                [
                    'label' => 'Filtrar',
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([]);
    }
}