@extends('layouts.admin')

@section('content')

    @if (session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @endif

    @if (count($projects) < 1)
        <div class="d-flex justify-content-center align-items-center h-100">
            <h1>There are no Projects</h1>
        </div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Latest Fix</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->title }}</th>
                        <td>{{ $project->latest_fix }}</td>
                        <td>
                            <a href="{{ route('admin.projects.show', ['project' => $project->slug]) }}"
                                class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="d-flex">
        {{ $projects->links() }}
    </div>
@endsection
