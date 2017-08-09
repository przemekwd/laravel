<?php

namespace App\Http\Controllers;

use App\Distributor;
use App\Forms\DistributorForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Kris\LaravelFormBuilder\FormBuilder;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributors = Distributor::all()->sortBy('name');

        return view('distributor.index', ['distributors' => $distributors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(DistributorForm::class, [
            'method' => 'POST',
            'url' => route('distributor.store'),
        ])
            ->add('submit', 'submit', [
                'label' => Lang::get('buttons.add'),
                'attr' => [
                    'class' => 'btn btn-success pull-right',
                    'role' => 'button',
                ]]);

        return view('distributor.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function store(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(DistributorForm::class, [
            'method' => 'POST',
            'url' => route('distributor.store'),
        ])
            ->add('submit', 'submit', [
                'label' => Lang::get('buttons.add'),
                'attr' => [
                    'class' => 'btn btn-success pull-right',
                    'role' => 'button',
                ],
            ]);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $distributor = new Distributor();
        $distributor->fill($form->getRequest()->all());
        $distributor->save();

        return redirect()->route('distributor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function show(Distributor $distributor)
    {
        return view('distributor.show', ['distributor' => $distributor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Distributor $distributor
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function edit(Distributor $distributor, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(DistributorForm::class, [
            'method' => 'PUT',
            'url' => route('distributor.update', ['id' => $distributor->id]),
            'model' => $distributor,
        ])
            ->add('submit', 'submit', [
                'label' => Lang::get('buttons.edit'),
                'attr' => [
                    'class' => 'btn btn-warning pull-right',
                    'role' => 'button',
                ],
            ]);

        return view('distributor.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Distributor $distributor
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distributor $distributor, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(DistributorForm::class, [
            'method' => 'PUT',
            'url' => route('distributor.update', ['id' => $distributor->id]),
        ])
            ->add('submit', 'submit', [
                'label' => Lang::get('buttons.edit'),
                'attr' => [
                    'class' => 'btn btn-warning pull-right',
                    'role' => 'button',
                ],
            ]);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $distributor->fill($form->getRequest()->all());
        $distributor->save();

        return redirect()->route('distributor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distributor $distributor)
    {
        $distributor->delete();

        return redirect()->route('distributor.index');
    }
}
