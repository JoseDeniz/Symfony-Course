<?php
/**
 * Created by PhpStorm.
 * User: JoseDeniz
 * Date: 25/04/16
 * Time: 00:26
 */

namespace PlanetExpress\UserBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class RegisterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class)
            ->add('email', EmailType::class)
            ->add('password', RepeatedType::class, ['type' => PasswordType::class])
            ->add('Register', SubmitType::class, ['label' => 'Register']);
    }

    /*public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => 'PlanetExpress\UserBundle\Entity\User']);
    }*/


}