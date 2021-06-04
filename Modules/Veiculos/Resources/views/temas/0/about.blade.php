@extends('veiculos::temas'.$siteId['tema'].'app')
@section('content')

@include('veiculos::temas.'.$siteId['tema'].'.breadcrumb',['data' => ['Início','Quem somos']])

@endsection