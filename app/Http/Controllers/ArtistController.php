<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Forms\ArtistForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Kris\LaravelFormBuilder\FormBuilder;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::all();

        return view('artist.index', ['artists' => $artists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(ArtistForm::class, [
            'method' => 'POST',
            'url' => route('artist.store'),
        ])
        ->add('submit', 'submit', [
            'label' => Lang::get('buttons.add'),
            'attr' => [
                'class' => 'btn btn-success pull-right',
                'role' => 'button',
            ]]);

        return view('artist.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(ArtistForm::class, [
                'method' => 'POST',
                'url' => route('artist.store'),
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

        $artist = new Artist();
        $artist->fill($form->getRequest()->all());
        $artist->save();

        return redirect()->route('artist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        return view('artist.show', ['artist' => $artist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        //
    }
}
