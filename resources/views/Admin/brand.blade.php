@extends('Admin.layout')
@section('body')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
         
<input type="hidden" id="idBrand" >
        
        <h4 class="">Striped Table 
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" > Add Brand</button>
        </h4>
        <h6 class="text-success " id="success">   </h6>
        <div class="table-responsive">
          <table class="table table-striped" id="datatable">
            <thead>
              <tr>
                <th>
                  ID
                </th>
                <th>
                 NAME
                </th>
                <th>
                  ACTION
                 </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($showBrand as $item)
              <tr>
                
                   
                
                <td class="py-1" >

                  {{$item->id}}
                </td>
                <td>
                  {{$item->brandName}}
                </td>
                <td>
                  
                  <button type="button" class="btn btn-outline-secondary" id="btnEdit" data-toggle="modal" data-target="#exampleModal2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                  </svg></button>
                  <button type="button" class="btn btn-outline-secondary" id="btnDelete" data-toggle="modal" data-target="#exampleModal3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                  </svg></button>
                 
                </td>
               
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- Button trigger modal -->

<!-- Modal Create-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD BRAND</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="exampleInputUsername1">BRAND NAME</label>
          <input type="text" class="form-control" id="brandname" placeholder="Brand name">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" data-dismiss="modal" id="btnSave">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<!-- Modal Delete-->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm you want to delete this brand?</h5>
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
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">UPDATE NAME</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="exampleInputUsername1">BRAND NAME</label>
          <input type="text" class="form-control" id="editName" placeholder="Brand name">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" data-dismiss="modal" id="Edit">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<script>
  $(document).ready(function(){
    
      $('#btnSave').click(function(){
        var name = $('#brandname').val();
        // alert(name);
                var url="{{route('addBrand')}}";       
                    $.get({
                            type:'get',
                            url:url,
                            data:{
                              name: name,
                        },
                      //  dataType: 'JSON',
                        success:function(s){
                           //  window.location.assign=""+s+"";
                            //alert(s);
                            location.reload(); 
                            
                            $('#success').text("Add Successful");
                        }
               
                });
            
      
      });
     
      $("#datatable").on('click','#btnEdit',function(){
        
        var currentRow = $(this).closest("tr");
        var id=currentRow.find("td:eq(0)").text();
        // alert(id);
        $("#idBrand").val(id.trim());
      
    });
    $("#datatable").on('click','#btnDelete',function(){
       
      var currentRow = $(this).closest("tr");
        var id=currentRow.find("td:eq(0)").text();
        // alert(id);
        $("#idBrand").val(id.trim());
      
    });
    $('#Edit').click(function(){
        var id = $('#idBrand').val();
        var name = $('#editName').val();
                var url="{{route('editBrand')}}";       
                    $.get({
                            type:'get',
                            url:url,
                            data:{
                              id: id,
                              name:name,
                        },
                     
                        success:function(s){
                           
                            
                            location.reload(); 
                            
                            $('#success').text("Delete Successfull");
                        }
               
                });
            
      
      });
      $('#Delete').click(function(){
        var id = $('#idBrand').val();
      
                var url="{{route('deleteBrand')}}";       
                    $.get({
                            type:'get',
                            url:url,
                            data:{
                              id: id,
                        },
                      //  dataType: 'JSON',
                        success:function(s){
                           
                            location.reload(); 
                            
                            $('#success').text("Delete Successful");
                        }
               
                });
            
      
      });
      
     
  });
</script>
@endsection