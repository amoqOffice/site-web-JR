@extends('back.layouts.app')

@section('content')
    @include('back.Enseignement.form', [$title='Détails de Enseignement', $edit=false, $show=true])
@endsection
