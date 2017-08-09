<?php

namespace App\Http\Controllers;

use App\Forms\TrackForm;
use App\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Kris\LaravelFormBuilder\FormBuilder;

class TrackController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, FormBuilder $formBuilder)
    {
        $albumid = $request->segment(2);
        $form = $formBuilder->create(TrackForm::class, [
            'method' => 'POST',
            'url' => route('track.store', ['album' => $albumid]),
            ])
            ->add('submit', 'submit', [
                'label' => Lang::get('buttons.add'),
                'attr' => [
                    'class' => 'btn btn-success pull-right',
                    'role' => 'button',
                ]]);

        return view('track.create', [
            'form' => $form,
            'albumid' => $albumid,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FormBuilder $formBuilder)
    {
        $albumid = $request->segment(2);
        $form = $formBuilder->create(TrackForm::class, [
            'method' => 'POST',
            'url' => route('track.store', ['albumid' => $albumid]),
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

        $track = new Track();
        $track->fill($form->getRequest()->all());
        $track->album_id = $albumid;
        $track->save();

        return redirect()->route('album.show', ['albumid' => $albumid]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param FormBuilder $formBuilder
     * @param int $albumid
     * @param int $id
     * @return \Illuminate\Http\Response
     * @internal param Track $track
     */
    public function edit(FormBuilder $formBuilder, $albumid, $id)
    {
        $track = Track::all()->find($id);
        $form = $formBuilder->create(TrackForm::class, [
            'method' => 'PUT',
            'url' => route('track.update', ['albumid' => $albumid, 'id' => $track->id]),
            'model' => $track,
        ])
            ->add('submit', 'submit', [
                'label' => Lang::get('buttons.edit'),
                'attr' => [
                    'class' => 'btn btn-warning pull-right',
                    'role' => 'button',
                ],
            ]);

        return view('track.edit', [
            'form' => $form,
            'albumid' => $albumid,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $albumid
     * @param FormBuilder $formBuilder
     * @param Track $track
     * @return \Illuminate\Http\Response
     */
    public function update($albumid, FormBuilder $formBuilder, Track $track)
    {
        $form = $formBuilder->create(TrackForm::class, [
            'method' => 'PUT',
            'url' => route('artist.update', ['id' => $track->id, 'albumid' => $albumid]),
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

        $track->fill($form->getRequest()->all());
        $track->save();

        return redirect()->route('album.show', ['id' => $albumid]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $albumid
     * @param Track $track
     * @return \Illuminate\Http\Response
     */
    public function destroy($albumid, Track $track)
    {
        $track->delete();

        return redirect()->route('album.show', ['id' => $albumid]);
    }
}
