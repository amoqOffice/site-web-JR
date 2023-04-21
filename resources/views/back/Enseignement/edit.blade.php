@extends('back.layouts.app')

@section('content')
    @include('back.Enseignement.form', [$title='Modifier Enseignement',  $edit=true, $show=false])
@endsection
