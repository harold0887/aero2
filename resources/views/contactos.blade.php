@extends('layouts.app', [
'class' => 'login-page',
'backgroundImagePath' => 'img/bg/fabio-mangione.jpg',
'folderActive' => '',
'elementActive' => '',
'title'=>'Contactos',
'navbarClass'=>'bg-dark',
'activePage'=>'contactos',



])

@section('content')
<div class="container-fluid pt-5 " style="height: auto; color: black; background-color: #F4F3EF !important">
    <livewire:correos-render />

</div>




@endsection