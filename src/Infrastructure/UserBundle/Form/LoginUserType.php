<?php

declare(strict_types=1);

namespace App\Infrastructure\UserBundle\Form;

use App\Domain\User\Model\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LoginUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'メールアドレス',
                'attr' => [
                    'class' => 'form-control'
                ],
            ])
            ->add('password', PasswordType::class, [
                'always_empty' => false,
                'label' => 'パスワード',
                'attr' => [
                    'class' => 'form-control'
                ],
            ])
            ->add('save', SubmitType::class, [
                'label' => '送信する',
                'attr' => [
                    'class' => 'btn btn-primary'
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
