@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center py-3"><strong>Crea un nuovo progetto</strong></h2>
        <div class="d-flex justify-content-center py-3">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary btn-lg">Torna alla lista progetti</a>
        </div>

        @include('shared.errors')

        <section class="py-5">
            <form action="{{ route('admin.projects.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" rows="6" name="description"></textarea>
                </div>
                <div class="mb-3">
                    <div class="mb-3">Tecnologie usate</div>
                    @foreach ($technologies as $technology)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="tec-{{ $technology->id }}"
                                value="{{ $technology->id }}" name="technologies[]"
                                {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="tec-{{ $technology->id }}">{{ $technology->name }}</label>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Crea un nuovo progetto</button>
            </form>
        </section>
    </div>
@endsection
