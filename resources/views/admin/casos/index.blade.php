@extends('layouts.app',[
'class' => '',
'folderActive' => '',
'elementActive' => 'dashboard',
'title'=>'Casos',
'navbarClass'=>'navbar-transparent',
'activePage'=>'casos',
])

@section('content')
@include('includes.spinner')

<livewire:admin.index-casos />


@endsection
@include('includes.alert-error')