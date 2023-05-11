@extends('back.layouts.app')

@section('content')
    @include('back.Categorie.form', [$title='Modifier la Catégorie',  $edit=true, $show=false])
@endsection
