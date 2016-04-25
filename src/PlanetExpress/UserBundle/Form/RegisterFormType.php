<?php

namespace PlanetExpress\UserBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegisterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class,
                ['constraints' => [new NotBlank(), new Length(['min' => 3])]])
            ->add('email', EmailType::class,
                ['constraints' => [new NotBlank(), new Email()]])
            ->add('password', RepeatedType::class, ['type' => PasswordType::class])
            ->add('Register', SubmitType::class, ['label' => 'Register']);
    }

    /*public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => 'PlanetExpress\UserBundle\Entity\User']);
    }*/


}