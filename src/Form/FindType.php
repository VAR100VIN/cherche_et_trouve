<?php

namespace App\Form;

use App\Entity\Find;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FindType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
       
            
            
           
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Find::class,
        ]);
    }
}
