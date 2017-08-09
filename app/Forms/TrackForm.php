<?php

namespace App\Forms;

use Illuminate\Support\Facades\Lang;
use Kris\LaravelFormBuilder\Form;

class TrackForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('number', 'text', [
                'attr' => [
                    'class' => 'form-control mb-2',
                ],
                'rules' => 'required|numeric',
                'label' => Lang::get('track.form.number'),
            ])
            ->add('title', 'text', [
                'attr' => [
                    'class' => 'form-control mb-2',
                ],
                'label' => Lang::get('track.form.name'),
                'required' => true,
            ]);
    }
}