@php
    $total = 0;
@endphp
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <h4>Full Name: {{$user->name}}</h4>
            <h4>Date: {{$user->date}}</h4>
            <h4>Phone: {{$user->phone}}</h4>
            <h4>Email: {{$user->email}}</h4>
            <h4>Address: {{$user->address}}</h4>

        
            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>
                        #ID
                      </th>
                      <th>
                        Product Name
                      </th>
                      <th>
                        Quantity
                      </th>
                      <th>
                        Price
                      </th>
                      <th>
                        Subtotal
                      </th>
                     
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($result as $item)
                         @php
                              $total += ($item->qty * $item->price);
                              
                         @endphp
                   
                    <tr >
                      <td>
                        # {{$item->id}}
                      </td>
                      <td>
                        {{$item->name}}
                      </td>
                      <td>
                          {{$item->qty}}
                      </td>
                      <td>
                        $ {{$item->price}}
                      </td>
                      <td>
                        $ {{$item->subtotal}}   
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
               
              </div>
              <h4>Total: ${{$total}}</h4>
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