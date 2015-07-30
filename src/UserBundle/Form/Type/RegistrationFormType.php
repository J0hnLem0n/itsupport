<?php
namespace UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;


class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('realname')
/*                ->add('roles', 'choice', array(
                         'choices'  => array(
                             'ROLE_SPEC' => 'Специалист',
                             'ROLE_PEOPLE' => 'Пользователь',
                          ),
                  ));
*/
                ->add('roles', 'collection', array(
                     'type'   => 'choice',
                     'options'  => array(
                         'choices'  => array(
                             'ROLE_SPEC' => 'Специалист',
                             'ROLE_PEOPLE' => 'Пользователь',
                          ),
                     ),
                  ));
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'app_user_registration';
    }
}