@extends('admin.main')
@section('content')
<div class="pagetitle">
    <h1>Edit Student</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"></li>
        <li class="breadcrumb-item active">Edit Student</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/admin/courses/update/{{ $course->id }}" method="post" class="mt-3">
                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$couse->name ?? ''}}">
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
  </section>
@endsection