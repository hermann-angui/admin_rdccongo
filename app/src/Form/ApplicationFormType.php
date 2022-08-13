<?php

namespace App\Form;

use App\Entity\Application;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ApplicationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            /* PERSONAL INFO */
            ->add('firstname',TextType::class, [
                'label' => "First name",
                'mapped' => true,
            ])
            ->add('lastname',TextType::class, [
                'label' => "Last name",
                'mapped' => true,
            ])
            ->add('middlename',TextType::class, [
                'label' => "Middle name",
                'mapped' => true,
            ])
            ->add('gender', ChoiceType::class, [
                'label' => "Sexe",
                'mapped' => true,
                'attr' => [
                    'class' => 'checkbox-inline checkbox-switch',
                ],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Male' => 'Male',
                    'Female' => 'Female',
                ],
                'empty_data' => 'Male',
                'data' => 'Male',
            ])
            ->add('marital_status', ChoiceType::class, [
                'label' => "Marital status",
                'label_attr' => [
                    'class' => 'checkbox-inline checkbox-switch',
                ],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Single' => 'Single',
                    'Married' => 'Married',
                    'Widowed' => 'Widowed',
                    'Divorced' => 'Divorced',
                    'Separated' => 'Separated',
                ],
                'empty_data' => '',
                'data' => '',
            ])
            ->add('place_of_birth', TextType::class, [
                'label' => 'Place of birth',
                'mapped' => true
            ])
            ->add('country_of_residence', TextType::class, [
                'label' => 'Country of residence',
                'mapped' => true
            ])
            ->add('profession', TextType::class, [
                'label' => 'Profession',
                'mapped' => true,
            ])
            ->add('date_of_birth', DateType::class, [
                'label' => 'Date of birth',
                'mapped' => true,
                'widget' => 'single_text',
                'format' => 'dd-mm-yyyy',
                'html5' => false
            ])
            ->add('country_of_birth', CountryType::class, [
                'mapped' => false,
            ])
            ->add('current_nationality', CountryType::class, [
                'mapped' => false,
            ])
            ->add('current_nationality_acquired_by', ChoiceType::class, [
                'mapped' => false,
                'choices'  => [
                    'Birth' => 'Birth',
                    'Marriage' => 'Marriage',
                    'Naturalisation' => 'Naturalisation',
                ],
            ])
            ->add('passport_scan', FileType::class, [
                'label' => 'Scanned copy of your passport (pdf or image format)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '4024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'image/*',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF or Image document',
                    ])
                ],
            ])
            ->add('invitation_letter_scan', FileType::class, [
                'label' => 'Scanned copy of your invitation letter (pdf or image format)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '4024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'image/*',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF or Image document',
                    ])
                ],
            ])
//            ->add('hotel_reservation_scan', FileType::class, [
//                'label' => 'Scanned copy of your hotel reservation (pdf or image format)',
//                'mapped' => false,
//                'required' => false,
//                'constraints' => [
//                    new File([
//                        'maxSize' => '1024k',
//                        'mimeTypes' => [
//                            'application/pdf',
//                            'application/x-pdf',
//                            'image/*',
//                        ],
//                        'mimeTypesMessage' => 'Please upload a valid PDF or Image document',
//                    ])
//                ],
//            ])
            ->add('flight_ticket_scan', FileType::class, [
                'label' => 'Scanned copy of your flight ticket (pdf or image format)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '4024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'image/*',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF or Image document',
                    ])
                ],
            ])
            ->add('address', TextareaType::class,[
                'mapped' => true,
            ])
            ->add('phone_number', TelType::class,[
                'mapped' => true,
            ])
            ->add('photo', FileType::class, [
                'label' => 'Upload your passport size photo',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '4024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'image/*',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF or Image document',
                    ])
                ],
            ])

            /* VISA */
            ->add('purpose_of_travel', ChoiceType::class, [
                'mapped' => true,
                'choices'  => [
                    'Family or friend visit' => 'Family or friend visit',
                    'Tourism' => 'Tourism',
                    'Journalist' => 'Journalist',
                    'Service mission' => 'Service mission',
                    'Official mission' => 'Official mission',
                    'Studies' => 'Studies',
                    'NGO Staff' => 'NGO Staff',
                    'Medical and research staff' => 'Medical and research staff',
                    'Cultural operator' => 'Cultural operator',
                    'Sport Organization' => 'Sport Organization',
                    'Clergyman' => 'Clergyman',
                ],
            ])

            /* TRANSIT */
            ->add('transit_depart_from', DateType::class, [
                'mapped' => true,
                'widget' => 'single_text',
                'format' => 'dd-mm-yyyy',
                'html5' => false,
            ])
            ->add('transit_depart_to', DateType::class, [
                'mapped' => true,
                'widget' => 'single_text',
                'format' => 'dd-mm-yyyy',
                'html5' => false
            ])
            ->add('transit_return_from', DateType::class, [
                'mapped' => true,
                'widget' => 'single_text',
                'format' => 'dd-mm-yyyy',
                'html5' => false,
                'attr' => ['class' => 'js-datepicker']
            ])
            ->add('transit_return_to', DateType::class, [
                'mapped' => true,
                'widget' => 'single_text',
                'format' => 'dd-mm-yyyy',
                'html5' => false
            ])

            /* ENTRYPOINT */
            ->add('visa_type', ChoiceType::class, [
                'mapped' => true,
                'label' => 'Type of visa',
                'choices'  => [
                    'Single' => 'Single',
                    'Double' => 'Double',
                    'Multiple' => 'Multiple',
                    'Transit' => 'Transit',
                ],
            ])
            ->add('first_entry_place', TextType::class, [
                'mapped' => true,
                'label' => 'Entry date',
            ])
            ->add('first_entry_date', DateType::class, [
                'mapped' => true,
                'label' => 'Entry place',
                'widget' => 'single_text',
                'format' => 'dd-mm-yyyy',
                'html5' => false
            ])
            ->add('first_returning_place', TextType::class, [
                'label' => 'Returning place',
                'mapped' => true,
            ])
            ->add('first_returning_date', DateType::class, [
                'mapped' => true,
                'label' => 'Returning date',
                'widget' => 'single_text',
                'format' => 'dd-mm-yyyy',
                'html5' => false
            ])
            ->add('last_entry_place', TextType::class, [
                'mapped' => true,
                'label' => 'Entry date',
            ])
            ->add('last_entry_date', DateType::class, [
                'mapped' => true,
                'label' => 'Entry place',
                'widget' => 'single_text',
                'format' => 'dd-mm-yyyy',
                'html5' => false
            ])
            ->add('last_returning_place', TextType::class, [
                'label' => 'Returning place',
                'mapped' => true,
            ])
            ->add('last_returning_date', DateType::class, [
                'mapped' => true,
                'label' => 'Returning date',
                'widget' => 'single_text',
                'format' => 'dd-mm-yyyy',
                'html5' => false
            ])

            /* GRANTED VISA */
            ->add('sponsorship_fullname', TextType::class, [
                'mapped' => true,
            ])
            ->add('sponsorship_address', TextareaType::class, [
                'mapped' => true,
            ])
            ->add('sponsorship_phonenumber', TelType::class, [
                'mapped' => true,
            ])
            ->add('sponsorship_garantee', TextType::class,[
                'mapped' => true,
            ])

            /* FATHER */
            ->add('father_firstname', TextType::class,[
                'mapped' => true,
                'label' => "Father's name",
            ])
            ->add('father_lastname', TextType::class,[
                'mapped' => true,
                'label' => "Father's last name",
            ])
            ->add('father_nationality', CountryType::class,[
                'mapped' => true,
                'label' => "Father's nationality",
            ])
            ->add('father_date_of_birth', DateType::class,[
                'mapped' => true,
                'label' => "Father's date of birth",
                'widget' => 'single_text',
                'format' => 'dd-mm-yyyy',
                'html5' => false
            ])

            /* MOTHER */
            ->add('mother_firstname', TextType::class,[
                'mapped' => true,
                'label' => "Mother's date of birth",
            ])
            ->add('mother_lastname', TextType::class,[
                'mapped' => true,
                'label' => "Mother's last name",
            ])
            ->add('mother_nationality', CountryType::class,[
                'mapped' => true,
                'label' => "Mother's nationality",
            ])
            ->add('mother_date_of_birth', DateType::class, [
                'mapped' => true,
                'label' => "Mother's date of birth",
                'widget' => 'single_text',
                'format' => 'dd-mm-yyyy',
                'html5' => false
            ])

            /* SPOUSE */
//            ->add('spouse_firstname', TextType::class, [
//                'mapped' => true,
//                'label' => "Spouse's first name",
//            ])
//            ->add('spouse_lastname', TextType::class, [
//                'mapped' => true,
//                'label' => "Spouse's last name",
//            ])
//            ->add('spouse_nationality', CountryType::class, [
//                'mapped' => true,
//                'label' => "Spouse's nationality",
//            ])
//            ->add('spouse_date_of_birth', DateType::class, [
//                'mapped' => true,
//                'label' => "Spouse's date of birth",
//                'widget' => 'single_text',
//                'format' => 'dd-mm-yyyy',
//                'html5' => false
//            ])

            /* PASSPORT */
            ->add('passport_type', ChoiceType::class, [
                'label' => 'Type of passport',
                'mapped' => true,
                'choices'  => [
                    'Ordinary' => 'Ordinary',
                    'Business' => 'Business',
                    'Service' => 'Service',
                    'Other' => 'Other',
                ],
            ])
            ->add('passport_number', TextType::class, [
                'label' => 'Passport number',
                'mapped' => true,
            ])
            ->add('passport_issue_date', DateType::class, [
                'label' => 'Issue date',
                'mapped' => true,
                'widget' => 'single_text',
                'format' => 'dd-mm-yyyy',
                'html5' => false
            ])
            ->add('passport_expirydate', DateType::class, [
                'mapped' => true,
                'label' => 'Valid until',
                'widget' => 'single_text',
                'format' => 'dd-mm-yyyy',
                'html5' => false
            ])
            ->add('passport_issueby', TextType::class, [
                'mapped' => true,
                'label' => 'Issue by'
            ])

       ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Application::class,
            'csrf_protection'   => false
        ]);
    }
}
