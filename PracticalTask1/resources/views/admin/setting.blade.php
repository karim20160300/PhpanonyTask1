@extends('admin.index')
@section('content')
<form method="post">
  @csrf
  <div class="form-group">
    <label for="sitename">Site Name:</label>
    <input name="sitename" type="text" class="form-control" id="sitename">
  </div>
  <div class="form-group">
    <label for="siteemail">Site Email Address:</label>
    <input name="siteemail" type="text" class="form-control" id="siteemail">
  </div>
  <div class="form-group">
  <label for="sitekeywords">Site Key Words:</label>
  <textarea name="sitekeywords" class="form-control" rows="5" id="sitekeywords"></textarea>
</div>
  <div class="form-group">
  <label for="">Description:</label>
  <textarea name="desc" class="form-control" rows="5" id="desc"></textarea>
</div>
<div class="form-group">
      <label for="sel1">Maintanance:</label>
      <select class="form-control" id="sel1" name="status">
        <option>Choose Status</option>
        <option value="enable">Enabled</option>
        <option value="disable">Disabled</option>
      </select>
        <div class="form-group">
  <label for="">Maintanance Message:</label>
  <textarea name="maintanancemsg" class="form-control" rows="5" id="maintanancemsg"></textarea>
</div>

  <button type="submit" class="btn btn-info">Save</button>
</form>      
@endsection	