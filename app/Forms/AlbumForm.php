<?php

namespace App\Forms;

use Illuminate\Support\Facades\Lang;
use Kris\LaravelFormBuilder\Form;

class AlbumForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'attr' => [
                    'class' => 'form-control mb-2',
                ],
                'label' => Lang::get('artist.form.name'),
            ])
            ->add('firstname', 'text', [
                'attr' => [
                    'class' => 'form-control mb-2',
                ],
                'label' => Lang::get('artist.form.firstname'),
            ])
            ->add('lastname', 'text', [
                'attr' => [
                    'class' => 'form-control mb-2',
                ],
                'label' => Lang::get('artist.form.lastname'),
            ])
            ->add('birth_date', 'text', [
                'widget' => 'single_text',
                'html5' => false,
                'attr' => [
                    'class' => 'form-control mb-2 js-datepicker',
                ],
                'label' => Lang::get('artist.form.birthdate_person_band'),
                'required' => true,
            ])
            ->add('country', 'text', [
                'attr' => [
                    'class' => 'form-control mb-2',
                ],
                'label' => Lang::get('artist.form.country'),
                'required' => true,
            ])
            ->add('band', 'checkbox', [
                'label' => Lang::get('artist.form.band'),
                'value' => 1,
                'default' => 1
            ]);
    }
}