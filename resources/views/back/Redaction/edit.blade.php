@extends('layouts.app')

@section('content')
    @include('back.Redaction.form', [$title='Modifier Redaction',  $edit=true, $show=false])
@endsection
