@extends('layouts.admin')

@section('content')
    <div class="mt-5 ms-5 z-1">



        <div class="d-flex justify-content-start gap-2">
            <a href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}" class="btn btn-primary"><i
                    class="fa-solid fa-pen"></i></a>
            <button type="submit" class="ms-openModalDelete btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>

            <a href="" class="btn btn-secondary" download><i class="fa-solid fa-down-long"></i></a>
        </div>



        <dl class="mt-3">
            <dt>Project Name</dt>
            <dd>{{ $project->title }}</dd>

            <dt>Latest Fix</dt>
            <dd>{{ $project->latest_fix }}</dd>

            <dt>Type</dt>
            <dd>{{ $project->type_id ? $project->type->name : 'Undefined' }}</dd>

            <dt>ReadME</dt>
            <dd>{{ $project->readme }}</dd>

            <dt>Technologies</dt>
            @foreach ($project->technologies as $technology)
                <div>
                    <dd class="d-inline p-1">{{ $technology->name }}</dd>
                    <span class="badge rounded-circle" style="background-color: {{ $technology->color }}">tag</span>
                </div>
            @endforeach
        </dl>

    </div>

    <div class="ms-modal-delete position-absolute top-50 start-50 border p-3 d-none">
        <div class="d-flex justify-content-space-between gap-5">
            <h3>Are you sure you want <br> to delete this project?</h3>
            <button class="ms-closeModalDelete btn btn-secondary"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <hr>
        <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
