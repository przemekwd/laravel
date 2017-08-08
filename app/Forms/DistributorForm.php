<?php

namespace App\Forms;

use Illuminate\Support\Facades\Lang;
use Kris\LaravelFormBuilder\Form;

class DistributorForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'attr' => [
                    'class' => 'form-control mb-2',
                ],
                'label' => Lang::get('distributor.form.name'),
                'required' => true,
            ])
            ->add('country', 'text', [
                'attr' => [
                    'class' => 'form-control mb-2',
                ],
                'label' => Lang::get('distributor.form.country'),
                'required' => true,
            ]);
    }
}