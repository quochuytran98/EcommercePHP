<div class="modal-header">
    <h5 class="modal-title">Bill Details  </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <h3>Full Name: {{$user->name}}</h3>
    <h3>Date: {{$user->date}}</h3>
    <h3>Phone: {{$user->phone}}</h3>
    <h3>Email: {{$user->email}}</h3>
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
                
         
          <tr >
            <td>
              #
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
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-primary">Save changes</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </div>