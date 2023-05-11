@extends('back.layouts.app')

@section('content')
    @include('back.Redaction.form', [$title='Nouvelle Redaction', $edit=false, $show=false])
@endsection


