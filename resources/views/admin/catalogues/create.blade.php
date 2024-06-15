@extends('admin.layout.master');

@section('title')
   Thêm mới danh mục sản phẩm
@endsection

@section('content')
<form action="{{route('admin.catelogues.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6"> 
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                 </div>
                <div class="mb-3 mt-3">
                    <label for="cover" class="form-label">Cover:</label>
                    <input type="file" class="form-control" id="cover" placeholder="Enter cover" name="cover">
                 </div>
        </div>

        <div class="col-md-6">
            
            <div class="form-check mb-3">
                <label class="form-check-label">
                <input class="form-check-input"  checked name="is_active"> is Active
                </label>
            </div>
        </div>
    </div>


  
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection