<?php

namespace App\Form;

use App\Entity\Incidencia;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class IncidenciaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo')
            ->add('descripcion')
            ->add('fechaCreacion', DateTimeType::class)
            ->add('resuelta', CheckboxType::class, [
                'label'    => 'Resuelta?',
                'required' => false, ])
            ->add('fechaResolucion', DateTimeType::class)
            ->add('categoria')
            ->add('tags')
            //->add('adjunto', FileType::class, ['label' => 'Adjunto (PDF)','required' => 'false'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Incidencia::class,
        ]);
    }
}