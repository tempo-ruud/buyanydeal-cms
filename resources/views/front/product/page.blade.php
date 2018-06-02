@extends('layouts.front.app')

@section('content')

    Name: {{ $product->name }}<br/>
    Description: {!! $product->content !!}<br/>
    Sku: {{ $product->sku }}<br/>
    Currency: {{ $product->currency }}<br/>

@endsection
