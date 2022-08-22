<?php

namespace App\Form;

use App\DTO\LoginDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Contracts\Translation\TranslatorInterface;

class LoginFormType extends AbstractType
{
    private TranslatorInterface $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',EmailType::class,[
                'required' => true
            ])
            ->add('password',PasswordType::class, [
                'invalid_message' => $this->translator->trans('invalid_password'),
                'attr' => ['class' => 'password'],
                'required' => true,
                'label' => 'Mot de passe',
                'constraints' => [
                    new NotBlank([
                        'message' => $this->translator->trans('provide_password'),
                    ]),
                    new Length([
                        'min' => 8,
                        'minMessage' => $this->translator->trans('password_invalid_character_number'),
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LoginDto::class,
        ]);
    }
}
