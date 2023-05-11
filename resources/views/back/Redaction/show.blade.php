@extends('layouts.app')

@section('content')
    @include('Redaction.form', [$title='Détails de Redaction', $edit=false, $show=true])
@endsection
