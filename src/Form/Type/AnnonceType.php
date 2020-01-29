<?php
/**
 * Created by PhpStorm.
 * User: madatin
 * Date: 22/01/20
 * Time: 08:45
 */

namespace App\Form\Type;


use App\Entity\Annonce;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CurrencyType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{

        public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [

                'attr' => ['class' => 'form-control','placeholder' => 'Titre'],
            ])
            ->add('content', TextareaType::class, [
                'attr' => ['class' => 'form-control','placeholder' => 'Contenu'],

            ])
            ->add('price', MoneyType::class, [
                'attr' => ['class' => 'form-control','placeholder' => 'Prix'],
            ])
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'btn btn-default submit'],
            ])
        ;

        $builder->add('category', EntityType::class, [
            'class' => Category::class,
            'choice_label' => 'name'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }

}