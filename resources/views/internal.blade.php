@extends('layouts.app', [
'class' => 'login-page',
'backgroundImagePath' => 'img/bg/fabio-mangione.jpg',
'folderActive' => '',
'elementActive' => '',
'title'=>'Inicio',
'navbarClass'=>'bg-dark',
'activePage'=>'internal',



])

@section('content')
<div class="container-fluid pt-5 " style="height: auto; color: black; background-color: #F4F3EF !important">
    <livewire:internal-render />

</div>




@endsection