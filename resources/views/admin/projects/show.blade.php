@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center py-3">Vista Progetto: {{ $project->title }}</h2>
        <div class="d-flex justify-content-center">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary btn-lg">Torna alla lista progetti</a>
        </div>

        <section class="py-3">
            @if (session('message'))
                <div class="allert alleert-success">
                    {{ session('message') }}
                </div>
            @endif
        </section>

        <section class="py-5">
            <div class="card">
                <div class="card-body text-center">
                    <h2>{{ $project->title }}</h2>
                    <div>DESCRIZIONE: {{ $project->description }}</div>
                    <div>SLUG: {{ $project->slug }}</div>
                    <div><strong>ID: {{ $project->id }}</strong></div>
                </div>
            </div>
        </section>
        <section>
            <h4>Technologies</h4>

            <ul>
                @foreach ($project->technologies as $technology)
                    <li>{{ $technology->name }}</li>
                @endforeach
            </ul>
        </section>
    </div>
@endsection
