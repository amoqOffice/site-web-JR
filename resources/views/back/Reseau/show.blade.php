@extends('back.layouts.app')

@section('content')
    @include('Reseau.form', [$title='Détails de Reseau', $edit=false, $show=true])
@endsection
