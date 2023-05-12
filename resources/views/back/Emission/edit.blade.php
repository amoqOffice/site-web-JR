@extends('back.layouts.app')

@section('content')
    @include('back.Emission.form', [$title='Modifier une Emission',  $edit=true, $show=false])
@endsection
