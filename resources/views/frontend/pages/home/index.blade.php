@extends('frontend.layouts.app')

@section('main-container')
    {{-- ==================== Home Page Components ==================== --}}
    <x-frontend.home.hero-search />
    <x-frontend.home.introduction />
    <x-frontend.home.featured-blogs :blogs="$blogs" />
    <x-frontend.home.why-choose-us />
    <x-frontend.home.how-to-use />
    <x-frontend.home.testimonials :feedbacks="$feedbacks" />
@endsection