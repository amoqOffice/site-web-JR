@extends('back.layouts.app')

@section('content')
    @php
        $data = [(object)[
                'text' => 'Admin',
                'link' => route('back.home'),
                'css_class' => 'text-primary',
            ], (object)[
                'text' => 'Accueil',
                'link' => '#',
                'css_class' => 'cursor-default',
            ]
        ];
        $content = 'Accueil';
    @endphp
    @widget('breadcrumb', compact('data', 'content'))
    
    <h2>Accueil</h2>
@endsection

