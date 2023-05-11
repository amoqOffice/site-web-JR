@extends('back.layouts.app')

@section('content')
    @include('back.Reseau.form', [$title='Nouveau Réseau social', $edit=false, $show=false])
@endsection
