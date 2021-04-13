
@extends('Admin.layout')
@section('body')

<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">All Product
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" > Add Product</button>
        </h4>
        <input type="hidden" id="idBrand" >
        <div class="table-responsive">
          <table class="table table-hover" id="datatable">
            <thead>
              <tr>
                <th>
                  ID
                </th>
                <th>
                  NAME PRODUCT
                </th>
                <th>
                  IMAGE
                </th>
                <th>
                    BRAND
                  </th>
                <th>
                  PRICE
                </th>
                <th>
                  QUANTITY
                </th>
                <th>
                    ACTION
                </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($show_product as $item)
                    
                
              <tr>
                <td class="py-1">
                 {{$item->id}}
                </td>
                <td>
                    {{$item->name}}
                </td>
                <td>
                  <?php 
                    $arr = "";
                    for ($i=0; $i < Count(explode(',',$item->image)) ; $i++) { 
                      $arr = explode(',',$item->image)[1];
                    }
                      ?>  
                    <img src="{{asset('public/image_product/'.$arr)}}" alt="Product" />
              
                <?php
                  ?> 
               
                  </td>
                
                <td>
                    {{$item->brandName}}   
                
                    
                    {{-- @foreach(explode(',',$item->image) as $row )
                      {{ $row }} </br>
                    @endforeach --}}
                   
                </td>
                <td>
                  $ {{$item->price}}
                </td>
                <td>
                    {{$item->quantity}}
                </td>
               
                <td>
                  <a href="{{route('getProduct',$item->id)}}" class="btn btn-outline-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                  </svg></a>
                  <button type="button" class="btn btn-outline-secondary" id="btnDelete" data-toggle="modal" data-target="#exampleModal3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                  </svg></button>
                     
                  </td>
              
                  @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
<!-- Modal Create-->
<form method="POST" action="{{route('addProduct')}}" id="upload_form" enctype="multipart/form-data">
  {{csrf_field()}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-body">
      
        <div class="form-group">
          <label for="exampleInputUsername1">Product name</label>
          <input type="text" class="form-control" id="Productname" name="Productname" placeholder="Product name">
          <label for="exampleInputUsername1">Brand name</label>
          <select class="form-control form-control-lg" aria-label="Default select example" name="Brandname" id="Brandname">
            
            @foreach ($showBrand as $item)
              <option value="{{$item->id}}">{{$item->brandName}}</option>
            @endforeach
           
          </select>
          <label for="exampleInputUsername1">Category</label>
          <select class="form-control form-control-lg" aria-label="Default select example" name="Category" id="Category">
            
            @foreach ($showCate as $item)
              <option value="{{$item->id}}">{{$item->nameCategory}}</option>
            @endforeach
           
          </select>
          <label for="exampleInputUsername1">Quantity</label>
          <input type="number" min="1" class="form-control" id="Quantity" name="Quantity" placeholder="Quantity">
          <label for="exampleInputUsername1">Price</label>
          <input type="number" min="0" class="form-control" id="Price" name="Price" placeholder="Price">
          <label for="exampleInputUsername1">Type</label>
          <select class="form-control form-control-lg" aria-label="Default select example" name="Type" id="Type">
              <option value="1">NON FEATURED</option>
              <option value="2">FEATURED</option>
         
           
          </select>
          <input type="file" class="form-control-file" name="image[]" multiple id="image[]">
          <label for="exampleInputUsername1">Description</label>
          <textarea  type="text" class="form-control" id="Description" name="Description" placeholder="Description"> </textarea>
        </div>
     
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary" id="btnSave">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>


<!-- Modal Delete-->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm you want to delete this product?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" data-dismiss="modal" id="Delete">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<!-- Modal Edit-->
<form method="POST" action="" id="upload_form" enctype="multipart/form-data">
  {{csrf_field()}}
<div class="modal fade" id="exampleModal22" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label id="22" for="exampleInputUsername1">Product name</label>
          <input type="text" class="form-control" id="Productname" name="Productname" >
          <label for="exampleInputUsername1">Brand name</label>
          <select class="form-control form-control-lg" aria-label="Default select example" name="Brandname" id="Brandname">
            
            @foreach ($showBrand as $item)
              <option value="{{$item->id}}">{{$item->brandName}}</option>
            @endforeach
           
          </select>
          <label for="exampleInputUsername1">Category</label>
          <select class="form-control form-control-lg" aria-label="Default select example" name="Category" id="Category">
            
            @foreach ($showCate as $item)
              <option value="{{$item->id}}">{{$item->nameCategory}}</option>
            @endforeach
           
          </select>
          <label for="exampleInputUsername1">Quantity</label>
          <input type="number" min="1" class="form-control" id="Quantity" name="Quantity" placeholder="Quantity">
          <label for="exampleInputUsername1">Price</label>
          <input type="number" min="0" class="form-control" id="Price" name="Price" placeholder="Price">
          <label for="exampleInputUsername1">Image</label>
          <input type="file" class="form-control-file" name="image" id="image">
          <label for="exampleInputUsername1">Description</label>
          <textarea  type="text" class="form-control" id="Description" placeholder="Description"> </textarea>
        </div>
     
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary" id="btnUpdate">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>
\<script>
  $(document).ready(function(){
    $("#datatable").on('click','#btnDelete',function(){
       
       var currentRow = $(this).closest("tr");
         var id=currentRow.find("td:eq(0)").text();
         // alert(id);
         $("#idBrand").val(id.trim());
       
     });

      $('#Delete').click(function(){
        var id = $('#idBrand').val();
       
                var url="{{route('deleteproduct')}}";       
                    $.get({
                            type:'get',
                            url:url,
                            data:{
                              id: id,
                        },
                      //  dataType: 'JSON',
                        success:function(s){
                           
                            location.reload(); 
                            alert('Delete Successfull')
                           
                        }
               
                });
            
      
      });
      
     
  });
</script>
@endsection