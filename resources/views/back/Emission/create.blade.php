@extends('back.layouts.app')

@section('content')
    @include('back.Emission.form', [$title='Nouvelle Emission', $edit=false, $show=false])
@endsection
