@extends('layouts.app',[
'class' => '',
'folderActive' => '',
'elementActive' => 'dashboard',
'title'=>'Plantillas',
'navbarClass'=>'navbar-transparent',
'activePage'=>'plantillas',
])

@section('content')
@include('includes.spinner')
<livewire:admin.index-posts />

@endsection
@include('includes.alert-error')