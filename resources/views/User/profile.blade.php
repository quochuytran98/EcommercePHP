@extends('User.layout')
@section('body')
<div class="checkout-area pt-100px pb-100px">
    <div class="container">
     
        <center><h4 style="    color: hsl(0, 100%, 50%);">Hello:  @php
            echo $tenphim = Session::get('name_user');
        @endphp </h4 > </br>
            <a href="{{route('logout')}}"  >LOGOUT</i></a>
        </center>

        <div class="row">
            <div class="ml-auto mr-auto col-lg-9">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default single-my-account" data-aos="fade-up" data-aos-delay="200">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title"> <a data-bs-toggle="collapse" class="collapsed" aria-expanded="true" href="#my-account-1">ALL YOUR ORDERS </a>
                                </h3>
                            </div>
                            <div id="my-account-1" class="panel-collapse collapse show" data-bs-parent="#faq">
                                <div class="panel-body">
                                    <table>
                                        <tr>
                                         <th>#</th>
                                          <th>Date</th>
                                          <th>Address</th>
                                       
                                          <th>Status</th>
                                        </tr>
                                        @foreach ($listbill as $item)
                                        <tr>
                                           
                                            <td><a  data-bs-toggle="modal" data-bs-target="#exampleModal" type="button"  class="details_order" data-id="{{$item->id_order}}">{{$item->id_order}}</a></td>
                                            <input type="hidden"  value="{{$item->id_order}}" class="order_id_{{$item->id_order}}">
                                            <td>{{$item->date}}</td>
                                            <td>{{$item->address}}</td>
                                            @switch($item->status)
                                                @case(1)
                                                <td>Processing</td>
                                                    @break
                                                @case(2)
                                                <td>Shipping</td>
                                                    @break
                                                @case(3)
                                                    <td>Success</td>
                                                     @break
                                                @case(4)
                                                     <td>Canceled</td>
                                                         @break
                                                @default
                                                <td>Processing</td>
                                            @endswitch
                                          
                                           
                                           
                                         
                                        </tr>
                                        @endforeach
                                      </table>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    
    tr:nth-child(even) {
      background-color: #dddddd;
    }
    </style>
<script>
$(document).ready(function(){
    $('.details_order').click(function(){
       
        var id = $(this).data('id');
       
        var detail = $('.order_id_'+id).val();
     
        
      
        // var _token = $('input[name="_token"]').val();
         var url="{{route('order_detail')}}";  
      
        $.ajax({
                url:url,
                method: 'GET',
                data:{
                   detail:detail
                   
                    },
                success:function(s){
                   // alert(s);
                     $('.modal-content').html(s);

                }

            });

            
            
      });
     
     
     
  });
</script>
@endsection