@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center py-3">Sezione Progetti Admin (S.P.A.)</h2>
        <div class="d-flex justify-content-center">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-lg">Crea un nuovo progetto</a>
        </div>
        <section class="py-5">
            <div class="d-flex">
                <div class="row">
                    @foreach ($projects as $project)
                        <div class="col-4 py-2">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $project->title }}</h5>
                                    <p class="card-text">{{ $project->description }}</p>
                                </div>
                                <div class="d-flex justify-content-around">
                                    <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary m-3">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </a>
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning m-3">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger m-3"><i class="fa-solid fa-bomb"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
