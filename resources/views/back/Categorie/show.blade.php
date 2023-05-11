@extends('back.layouts.app')

@section('content')
    @include('Categorie.form', [$title='Détails de la Catégorie', $edit=false, $show=true])
@endsection
