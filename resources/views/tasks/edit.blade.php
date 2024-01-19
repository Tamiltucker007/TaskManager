@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Task') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                            @csrf
                            @method('put')
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="title" value="{{ $task->title }}"
                                        placeholder="Title">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="description" rows="3">{{ $task->description }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">Due Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="due_date"
                                    value="{{ old('due_date', $task->due_date) }}">
                                    @error('due_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">Completed Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="completed_at"
                                        value="{{ old('completed_at',$task->completed_at) }}">
                                    @error('completed_at')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row col-md-6">
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                </div>
                                <div class="col-sm-3">
                                    <a href="{{ route('tasks.index') }}"
                                        class="btn btn-sm btn-secondary float-end">Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
