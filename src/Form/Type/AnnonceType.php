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
        $cat1 = new Category();
        $cat1->setName('Type 1');
        $cat1->setColor('Bleue');
        $cat2 = new Category();
        $cat2->setName('Type 2');
        $cat2->setColor('Rouge');
        $categories = [$cat1, $cat2];

        $builder
            ->add('title', TextType::class)
            ->add('content', TextareaType::class)
            ->add('price', MoneyType::class)
            ->add('save', SubmitType::class)
        ;

        $builder->add('category', ChoiceType::class, [
            'choices' => $categories,

            'choice_label' => function(Category $category, $key, $value) {
                return strtoupper($category->getName());
            },
            'choice_attr' => function(Category $category, $key, $value) {
                return ['class' => 'category_'.strtolower($category->getName())];
            },
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }

}