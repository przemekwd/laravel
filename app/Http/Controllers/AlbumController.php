<?php

namespace App\Http\Controllers;

use App\Album;
use App\Forms\AlbumForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Kris\LaravelFormBuilder\FormBuilder;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all()->sortBy('title');

        return view('album.index', ['albums' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {

        $form = $formBuilder->create(AlbumForm::class, [
            'method' => 'POST',
            'url' => route('album.store'),
            'model' => new Album(),
        ])
            ->add('submit', 'submit', [
                'label' => Lang::get('buttons.add'),
                'attr' => [
                    'class' => 'btn btn-success pull-right',
                    'role' => 'button',
                ]]);

        return view('album.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        return view('album.show', ['album' => $album]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        //
    }
}
