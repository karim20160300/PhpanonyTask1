@extends('admin.index')
@section('content')
<!-- Small boxes (Stat box) -->
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
@foreach($cats as $cat)
    <tr>
      <th scope="row">{{ $cat->id }}</th>
      <td>{{ $cat->catname }}</td>
      <td><a class="btn btn-info" href="{{ url('admin/editcat/'.$cat->id) }}"><i class="fa fa-edit"></i> Edit</a>
      	<a class="btn btn-danger" onclick="return confirm('Are you sure you want to Remove?');" href="{{ url('admin/deletecat/'.$cat->id) }}"><i class="fa fa-trash"></i> Delete</a>
      	<a class="btn btn-default" href="{{ url('admin/showcat/'.$cat->id) }}"><i class="fa fa-eye"></i> Show</a></td>
    </tr>
@endforeach
  </tbody>
</table>
@endsection 