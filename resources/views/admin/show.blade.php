@extends('layouts.admin')

@section('content')
    <div>

        <div class="mb-3 d-flex mt-3" >

            <div class="d-flex justify-content-start  gap-2">
                <a href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}" class="btn btn-primary"><i
                        class="fa-solid fa-pen"></i></a>

                <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}" method="POST">

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>

                </form>

                <a href="" class="btn btn-secondary" download><i class="fa-solid fa-down-long"></i></a>
            </div>

        </div>

        <dl>
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
                <dd style="background-color: {{ $technology->color }}" class="d-inline p-1 rounded text-white">
                    {{ $technology->name }}</dd>
            @endforeach

            {{-- <dt>File Size</dt>
            <dd>{{ file_size(storage('app/public/projects_file')) }}</dd> --}}
        </dl>

    </div>
@endsection
