@extends('back.layouts.app')

@section('content')
    @include('back.Redaction.form', [$title='Nouvel Redaction', $edit=false, $show=false])
@endsection
