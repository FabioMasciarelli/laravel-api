@extends('layouts.admin')

@section('content')
    <h1>Create New Project</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="input-group mb-3 mt-5">
            <input type="file" class="form-control" id="uploadfile" name="upload_file">
            <label class="input-group-text" for="uploadfile">Upload file</label>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="mb-3">
            <label for="readme" class="form-label">ReadME</label>
            <textarea class="form-control" id="readme" rows="3" name="readme"></textarea>
        </div>

        <div class="mb-3">
            <label for="latest_fix" class="form-label">Latest fix</label>
            <input type="text" class="form-control" id="latest_fix" name="latest_fix" placeholder="YYYY-MM-DD">
        </div>

        <div class="mb-3">
            <label for="select_type">Select Type</label>
            <select class="form-select form-select-md" id="select_type" name="type_id">
                <option selected>Type</option>
                <option value="1">Full-Stack</option>
                <option value="2">Back-End</option>
                <option value="3">Front-End</option>
            </select>
        </div>

        <div class="btn-group" role="group">
            @foreach ($technologies as $technology)
                <input @checked(in_array($technology->id, old('technologies', []))) type="checkbox" name="technologies[]" class="btn-check"
                    id="accessory {{ $technology->id }}" value="{{ $technology->id }}">
                <label class="btn btn-outline-primary" for="accessory {{ $technology->id }}">{{ $technology->name }}</label>
            @endforeach
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </form>
@endsection
