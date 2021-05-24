<?php

namespace App\Form;

use App\Entity\Jouet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JouetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('des_jouet')
            ->add('qte_stock_jouet')
            ->add('pu_jouet')
        ;
    }

    //        $form  = $this->createFormBuilder($toy)
////                ->add('code_four_jouer') //ERROR : Object of class App\Entity\Fournisseur could not be converted to string
//            ->add('des_jouet',TextType::class)
//                ->add('qte_stock_jouet')
//                ->add('pu_jouet')
//                ->getForm();

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Jouet::class,
        ]);
    }
}
