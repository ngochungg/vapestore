
<link rel="stylesheet" href="{{ asset('admins/product/add/add.css')}}">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
    <div><h5>Name</h5>{{Auth::user()->name}}</div>
    <div><h5>Phone</h5>{{Auth::user()->phone}}</div>
    <div><h5>Address</h5>{{Auth::user()->address}}</div>
    <div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name Product</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($DetailOrders as $Detail)
        <tr>
            <td>{{$Detail->product_name}}</td>
            <td>{{$Detail->product_price}}</td>
            <td >{{$Detail->product_sales_quantity}}</td>
            <td></td>
        </tr>
        @endforeach
        <tr>
            <td colspan="2">Status:
            @if($orders->order_status == 'New order')
                    Orders are waiting for confirmation
            @elseif($orders->order_status == 'Cancel')
                    The shop refused the order
            @elseif($orders->order_status == 'Processing')
                    Order is being shipped
            @elseif($orders->order_status == 'Processed')
                    Order completed
                @endif
            </td>
            <td>Total: ${{$orders->order_total}}</td>
        </tr>

        </tbody>
    </table></div>
</div>
<div class="col-md-2"></div>
</div>
<hr>

