@extends('Admin.layout')
@section('body')

<div class="col-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Basic form elements</h4>
        <p class="card-description">
          Basic form elements
        </p>
        <form   method="POST" class="forms-sample" action="{{route('updateProduct',$show_product->id)}}" id="upload_form" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" class="form-control" id="Productname" name="Productname" value="{{$show_product->name}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Brand</label>
            <select class="form-control form-control-lg" aria-label="Default select example" name="Brandname" id="Brandname">
            
                @foreach ($showBrand as $item)
                 
                  <option value="{{$item->id}}">{{$item->brandName}}</option>
                @endforeach
               
              </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Quantity</label>
            <input type="number" class="form-control" id="Quantity" name="Quantity" value="{{$show_product->quantity}}">
          </div>
          <div class="form-group">
            <label for="exampleSelectGender">Price</label>
            <input type="number" class="form-control" id="Price" name="Price" value="{{$show_product->price}}">
            </div>
          <div class="form-group">
            <label>File upload</label>
            <input type="file" name="img[]" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="file" class="form-control file-upload-info" id="image" name="image" placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
              </span>
            </div>
          </div>
          
          <div class="form-group">
            <label for="exampleSelectGender">TYPE</label>
              <select  class="form-control" name="Type" id="Type">
                <option selected value="0">NON FEATURED</option>
                        <option   value="1">FEATURE</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleSelectGender">Status</label>
              <select  class="form-control" name="Status" id="Status">
              
                <option selected  value="1">Selling</option>
                   <option  value="0">Available</option>
                
              </select>
            
                 
                </select>
              </div>
              
          <div class="form-group">
            <label for="exampleTextarea1">Description</label>
            <textarea class="form-control" id="Description" name="Description" rows="4">{{$show_product->description}}</textarea>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>

  <script>
  
</script>
@endsection