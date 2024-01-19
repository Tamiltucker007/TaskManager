@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create Task') }}
                        <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-secondary float-end">Back</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.store') }}">
                            @csrf
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="title" placeholder="Title">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="description" rows="3"></textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">Due Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="due_date">
                                    @error('due_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">Completed Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="completed_at">
                                    @error('completed_at')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row col-md-6">
                                <div class="col-sm-3 d-flex justify-content-start">
                                    <button type="submit" class="btn btn-sm btn-primary mr-1">Submit</button>
                                    <button type="reset" class="btn btn-sm btn-danger ml-2">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
