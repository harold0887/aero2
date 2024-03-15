@extends('layouts.app',[
'class' => '',
'folderActive' => '',
'elementActive' => 'dashboard',
'title'=>'Contactos',
'navbarClass'=>'navbar-transparent',
'activePage'=>'contactos',
])

@section('content')
@include('includes.spinner')
<livewire:index-correos />

@endsection
@include('includes.alert-error')