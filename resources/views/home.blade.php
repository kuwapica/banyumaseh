@extends('layouts.app')

@section('title', 'Home')

@section('header')
    <h1>WELCOME TO THE WEBSITE</h1>
    <p>Welcome to an exploration of Banyumas rich history and unrivaled beauty.</p>
@endsection

@section('content')
    <!-- Featured Section -->
    {{-- <section id="featured" class="py-4">
        <div class="container">
            <div class="title-wrap">
                <span class="sm-title">know some destination locations before you travel</span>
                <h2 class="lg-title">VARIOUS DESTINATIONS FOR YOU</h2>
            </div>

            <div class="featured-row">
                @foreach($destinations as $destination)
                <div class="featured-item my-2 shadow">
                    <img src="{{ asset('storage/'.$destination->image) }}" alt="{{ $destination->name }}">
                    <div class="featured-item-content">
                        <span>
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $destination->name }}
                        </span>
                        <div>
                            <p class="text">{{ $destination->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section> --}}

    <!-- Services Section -->
    <section id="services" class="py-4">
        <div class="container">
            <div class="title-wrap">
                <span class="sm-title">know the advantages about our services</span>
                <h2 class="lg-title">our advantages</h2>
            </div>

            <div class="services-row">
                <div class="services-item">
                    <span class="services-icon">
                        <i class="fas fa-info"></i>
                    </span>
                    <h3>Information</h3>
                    <p class="text">Dalam perjalanan menuju keunggulan destinasi kami, terdapat serangkaian pengalaman tak terlupakan yang memikat indera dan jiwa...</p>
                    <a href="#" class="btn">Read more</a>
                </div>

                <div class="services-item">
                    <span class="services-icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </span>
                    <h3>Guide</h3>
                    <p class="text">Panduan kami adalah pencerminan dari dedikasi yang mendalam dalam memberikan arahan yang tepat...</p>
                    <a href="#" class="btn">Read more</a>
                </div>

                <div class="services-item">
                    <span class="services-icon">
                        <i class="fas fa-money-bill"></i>
                    </span>
                    <h3>Experience</h3>
                    <p class="text">Destinasi kami menawarkan lebih dari sekadar informasi, memungkinkan Anda untuk terlibat secara langsung...</p>
                    <a href="#" class="btn">Read more</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Section -->
    <section id="video">
        <div class="video-wrapper flex">
            <video loop>
                <source src="{{ asset('videos/banyumas.mp4') }}" type="video/mp4">
            </video>
            <button type="button" id="play-btn">
                <i class="fas fa-play"></i>
            </button>
        </div>
    </section>
@endsection