@extends('back.layouts.app')

@section('content')
    @include('Emission.form', [$title='Détails de Emission', $edit=false, $show=true])
@endsection
