@extends('Admin.layout')
@section('body') 

<div class="card-body">
    <h4 class="card-title">Bordered table</h4>
    <p class="card-description">
      Add class <code>.table-bordered</code>
    </p>
    <div class="table-responsive quochuyu pt-3">
      <table class="table table-bordered"  id="datatable">
        <thead>
          <tr>
            <th>
              #ID
            </th>
            <th>
              DATE
            </th>
            <th>
              NAME
            </th>
            <th>
              ADDRESS
            </th>
            <th>
                PHONE
              </th>
              <th>
                PAYMENTS
              </th>
            <th>
              STATUS
            </th>
            <th>
                ACTION
              </th>
          </tr>
        </thead>
        <tbody>
            @foreach ($listbill as $item)
                
         
          <tr>
            <td>

              {{$item->id_order}}
            </td>
            <td>
                {{$item->date}}
            </td>
            <td>
              {{$item->name}}
               
            </td>
            <td>
                {{$item->address}}
            </td>
            <td>
                {{$item->phone}}
            </td>
            @switch($item->status)
            @case(1)
            <td>Paypal
              
            </td>
            
                @break
            @case(2)
            <td>COD</td>
                @break
            
            @default
            <td>COD</td>
        @endswitch
            @switch($item->status)
                                                @case(1)
                                                <td class="text-primary">Processing
                                                  
                                                </td>
                                                
                                                    @break
                                                @case(2)
                                                <td class="text-info">Shipping</td>
                                                    @break
                                                @case(3)
                                                    <td class="text-success">Success</td>
                                                     @break
                                                @case(4)
                                                     <td class="text-danger">Canceled</td>
                                                         @break
                                                @default
                                                <td class="text-primary">Processing</td>
                                            @endswitch
                                            
                                            
              <td>
                @csrf
                <input type="hidden"  value="{{$item->id_order}}" class="id_{{$item->id_order}}">
                <button type="button " class="btn btn-primary quickview" id="quickview" class="btn btn-primary" data-id="{{$item->id_order}}" data-toggle="modal" data-target=".bd-example-modal-lg">Details</button> 
              ||
              
             
              <button type="button " class="btn btn-primary btnEdit" id="btnEdit" class="btn btn-primary" data-id="{{$item->id_order}}" data-toggle="modal" data-target="#exampleModal">Edit Status</button> 
            
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
<!-- Large modal -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update  Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="exampleInputUsername1">Status</label>
        <input type="text" id="idBrand" >
          <select class="form-control form-control-lg" aria-label="Default select example" name="statuss" id="statuss">
            
           
              <option value="1">Processing</option>
              <option value="2">Shipping</option>
              <option value="3">Success</option>
              <option value="4">Canceled</option>
           
           
          </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="submitEdit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content huyhuyhuy">
      
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('.quickview').click(function(){
        //swal("Here's the title!", "...and here's the text!");
        var id = $(this).data('id');
      
      var quickview_id = $('.id_'+id).val();
    
        // var _token = $('input[name="_token"]').val();
     var url="{{route('details_bill')}}";  
       
        $.ajax({
                url:url,
                method: 'GET',
                data:{
                    quickview_id:quickview_id,
                    
                   },
                success:function(s){
                        // $('.modal-content').html(s);
                   
                        $('.huyhuyhuy').html(s);

                }

            });

            
            
      });

    //   $("#datatable").on('click','#btnEdit',function(){
       
    //    var currentRow = $(this).closest("tr");
    //      var id=currentRow.find("td:eq(0)").text();
       
    //       $("#idBrand").val(id.trim());
       
    //  });
      $('.btnEdit').click(function(){
        var id = $(this).data('id');
        var id_bill = $('.id_'+id).val();
      //  var id = $('#idBrand').val();
      $("#idBrand").val(id_bill);
        var stt = $('#statuss').val();
       
   
        var url="{{route('updateStatus')}}";    
       
        // $.ajax({
        //         url:url,
        //         method: 'GET',
        //         data:{
        //           id:id_bill,
        //           stt:stt,
                    
        //            },
        //         success:function(s){
        //                  $('.quochuyu').html(s);
                   
        //             //alert(s);

        //         }

        //     });

            
            
      });


      $('#submitEdit').click(function(){
      
        var id = $('#idBrand').val();
        var stt = $('#statuss').val();
       // alert (id);
   
        var url="{{route('updateStatus')}}";    
       
        $.ajax({
                url:url,
                method: 'GET',
                data:{
                  id:id,
                  stt:stt,
                    
                   },
                success:function(s){
                  location.reload();
                   
                    //alert(s);

                }

            });

            
            
      });
  })
</script>
@endsection