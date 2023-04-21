@extends('back.layouts.app')

@section('content')
    @php
        $data = [(object)[
                'text' => 'Admin',
                'link' => route('back.home'),
                'css_class' => 'text-primary',
            ], (object)[
                'text' => 'Enseignement',
                'link' => route('enseignement.create'),
                'css_class' => 'text-primary',
            ], (object)[
                'text' => 'Ajouter',
                'link' => '#',
                'css_class' => 'cursor-default',
            ]
        ];
        $content = 'Enseignement';
    @endphp
    @widget('breadcrumb', compact('data', 'content'))

    @include('back.Enseignement.form', [$title='Nouvel Enseignement', $edit=false, $show=false])
@endsection
