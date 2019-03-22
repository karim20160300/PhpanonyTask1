@extends('admin.index')
@section('content')
<!-- Small boxes (Stat box) -->
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Category Name</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><input type="text" disabled value="{{ $cat->catname }}"></td>
    </tr>

  </tbody>
</table>
@endsection 