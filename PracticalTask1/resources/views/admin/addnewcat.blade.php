@extends('admin.index')
@section('content')
<!-- Small boxes (Stat box) -->
      <form method="post">
        @csrf
  <div class="form-group">
    <label for="catname">Category name:</label>
    <input type="text" class="form-control" name="catname">
  </div>
  <button type="submit" class="btn btn-info"> Add</button>
</form>
@endsection 