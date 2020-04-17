@extends('layouts.app')
@section('content')
    <!-- begin first-screen -->
    @include('blocks.catalogslider')     
    <!-- end first-screen -->
    <!-- begin slogan -->
    @include('blocks.catalogslogan') 
    <!-- end slogan -->
    <!-- begin catalog -->
    <section>    
        @include('blocks.catalogfilter') 
        @include('blocks.catalogcontainer')
    </section>
    <!-- end catalog -->
    <!-- begin news -->
    {{-- новинки здесь и на главной стрнице--}}
    @include('blocks.catalognews', array('productNews'=> $productNews) )
 <!-- end news -->
@endsection
