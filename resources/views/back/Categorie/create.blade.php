@extends('back.layouts.app')

@section('content')
    @include('back.Categorie.form', [$title='Nouvelle Categorie', $edit=false, $show=false])
@endsection
