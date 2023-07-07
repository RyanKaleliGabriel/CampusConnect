@extends('layouts.app')
@section('content')
<form action="{{route('storeproduct')}}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Product</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product">
    <label for="exampleInputEmail1">Product Price</label>
    <input type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Price">
    <br><br>
    @error('name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
  </div>
  <label class="block mb-4">
                    <span class="sr-only">Choose File</span>
                    <input type="file" name="image"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                    @error('image')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </label>
  <br><br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection