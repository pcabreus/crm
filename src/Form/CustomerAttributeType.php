<?php

namespace App\Form;

use App\Entity\Attribute;
use App\Entity\CustomerAttributes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomerAttributeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('attribute', TextType::class, ['disabled' => true, 'label' => false]);

        $builder->addEventListener(
            FormEvents::POST_SET_DATA,
            function (FormEvent $event) {
                $form = $event->getForm();
                /** @var CustomerAttributes $data */
                $data = $event->getData();

                $options = ['label' => false];
                switch ($data->getAttribute()->getType()) {
                    case Attribute::BOOLEAN:
                    {
                        $type = CheckboxType::class;
                        break;
                    }
                    case Attribute::DATE:
                    {
                        $type = DateType::class;
                        $options += $data->getAttribute()->getOptions();
                        break;
                    }
                    case Attribute::CHOICE:
                    {
                        $type = ChoiceType::class;
                        $options += $data->getAttribute()->getOptions();
                        break;
                    }
                    default:
                    {
                        $type = TextType::class;
                    }
                }
                $form->add('value', $type, $options);
            }
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => CustomerAttributes::class,
            ]
        );
    }
}
