@extends('back.layouts.app')

@section('content')
    @include('back.Redaction.form', [$title='Détails de Redaction', $edit=false, $show=true])
@endsection
