<?php

namespace App\Http\Controllers;

use App\Album;
use App\Forms\AlbumForm;
use App\Genre;
use DateTime;
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
     * @param  \Illuminate\Http\Request $request
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(AlbumForm::class, [
            'method' => 'POST',
            'url' => route('album.store'),
            ])
            ->add('submit', 'submit', [
                'label' => Lang::get('buttons.add'),
                'attr' => [
                    'class' => 'btn btn-success pull-right',
                    'role' => 'button',
                ]]);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $album = new Album();
        $album->fill($form->getRequest()->all());
        $album->saveCover($request);
        $album->created = new DateTime('now');
        $album->save();

        foreach ($request->get('genres') as $genre) {
            $album->genres()->attach($genre[0]);
        }

        foreach ($request->get('mediums') as $medium) {
            $album->mediums()->attach($medium[0]);
        }

        return redirect()->route('album.index');
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
     * @param  \App\Album $album
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(AlbumForm::class, [
            'method' => 'PUT',
            'url' => route('album.update', ['id' => $album->id]),
            'model' => $album,
        ])
            ->add('submit', 'submit', [
                'label' => Lang::get('buttons.edit'),
                'attr' => [
                    'class' => 'btn btn-warning pull-right',
                    'role' => 'button',
                ],
            ]);

        return view('album.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Album $album
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(AlbumForm::class, [
            'method' => 'PUT',
            'url' => route('album.update', ['id' => $album->id]),
            'model' => $album,
        ])
            ->add('submit', 'submit', [
                'label' => Lang::get('buttons.edit'),
                'attr' => [
                    'class' => 'btn btn-success pull-right',
                    'role' => 'button',
                ],
            ]);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $album->fill($form->getRequest()->all());
        $album->saveCover($request);
        $album->save();

        foreach ($request->get('genres') as $genre) {
            $album->genres()->attach($genre[0]);
        }

        foreach ($request->get('mediums') as $medium) {
            $album->mediums()->attach($medium[0]);
        }

        return redirect()->route('artist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->genres()->detach();
        $album->mediums()->detach();
        $album->delete();

        return redirect()->route('album.index');
    }
}
