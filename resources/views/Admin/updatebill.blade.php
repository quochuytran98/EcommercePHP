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
                                            <td>Processing
                                              
                                            </td>
                                            
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