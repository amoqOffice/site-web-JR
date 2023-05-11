@extends('back.layouts.app')

@section('content')
    @include('back.Reseau.form', [$title='Modifier Réseau social',  $edit=true, $show=false])
@endsection
