<?php

namespace App\Forms;

use App\Artist;
use App\Distributor;
use App\Genre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Kris\LaravelFormBuilder\Form;

class AlbumForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', 'text', [
                'attr' => [
                    'class' => 'form-control mb-2',
                ],
                'label' => Lang::get('album.form.title'),
                'required' => true,
            ])
            ->add('description', 'text', [
                'attr' => [
                    'class' => 'form-control mb-2',
                ],
                'label' => Lang::get('album.form.description'),
            ])
            ->add('release_date', 'text', [
                'widget' => 'single_text',
                'html5' => false,
                'attr' => [
                    'class' => 'form-control mb-2 release',
                ],
                'label' => Lang::get('album.form.release_date'),
                'required' => true,
            ])
            ->add('record_year', 'text', [
                'widget' => 'single_text',
                'html5' => false,
                'rules' => 'required|numeric',
                'attr' => [
                    'class' => 'form-control mb-2',
                ],
                'label' => Lang::get('album.form.record_year'),
            ])
            ->add('artist', 'entity', [
                'class' => 'App\Artist',
                'query_builder' => function (Artist $artist) {
                    return $artist
                        ->select(DB::raw('CONCAT(COALESCE(name, ""), COALESCE(firstname, ""), " ", COALESCE(lastname, "")) AS pname'), 'id')
                        ->orderBy('name')
                        ->orderBy('lastname')
                        ->orderBy('firstname');
                },
                'property' => 'pname',
                'attr' => [
                    'class' => 'form-control mb-2',
                ],
                'label' => Lang::get('album.form.artist'),
                'required' => true,
            ])
            ->add('distributor', 'entity', [
                'class' => 'App\Distributor',
                'query_builder' => function (Distributor $distributor) {
                    return $distributor
                        ->orderBy('name')
                        ->get();
                },
                'attr' => [
                    'class' => 'form-control mb-2',
                ],
                'label' => Lang::get('album.form.distributor'),
                'required' => true,
            ])
            ->add('genres', 'entity', [
                'class' => 'App\Genre',
                'property' => 'name_pl',
                'attr' => [
                    'class' => 'form-control mb-2 genres',
                    'multiple' => 'multiple',
                ],
                'expanded' => true,
                'multiple' => true,
                'label' => Lang::get('album.form.genres'),
                'label_attr' => [
                    'class' => 'block',
                ],
            ])
            ->add('mediums', 'entity', [
                'class' => 'App\Medium',
                'attr' => [
                    'class' => 'form-control mb-2 genres',
                    'multiple' => 'multiple',
                ],
                'expanded' => true,
                'multiple' => true,
                'label' => Lang::get('album.form.mediums'),
                'label_attr' => [
                    'class' => 'block',
                ],
            ]);
    }
}