@extends('admin.layouts._masterLayout')

@section('content')
<div class="container-fluid">
    <div class="block">
        @if(session('message'))
          <div class="alert alert-success">
              {{ session('message') }}
          </div>
        @endif
        <div class="title"><strong>Categories</strong></div>
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary text-black">Add new</a>
        @if (count($categories))
          <div class="table-responsive"> 
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Preview</th>
                  <th>Is Active</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                  <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td><img style="width: 80px; height: 40px; object-fit: cover" src="{{ asset('uploads/' . $category->image) }}" alt="" srcset=""></td>
                    <td>{{ $category->is_active ? 'true' : 'false'}}</td>
                    <td>
                        <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary text-black">Edit</a>
                        <a href="{{ route('admin.category.delete', $category->id) }}" class="btn btn-secondary delete-btn text-black">Delete</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @endif
       
    </div>
</div>
@endsection

@section('scripts')
<script>
  $('.delete-btn').click(e => {
    if(confirm("Bạn có chắc muốn xóa ?")) {
      return true
    }
    else {
      e.preventDefault()
    }
  })
</script>

@endsection