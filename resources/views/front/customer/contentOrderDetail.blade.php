
<link rel="stylesheet" href="{{ asset('admins/product/add/add.css')}}">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
    <div>
        <h4>Name</h4>
        <div style="font-size: 16px">{{Auth::user()->name}}</div>
    </div>
    <div>
        <h4>Phone</h4>
        <div style="font-size: 16px">{{Auth::user()->phone}}</div>
    </div>
    <div>
        <h4>Address</h4>
        <div style="font-size: 16px">{{Auth::user()->address}}</div>
    </div>
    <div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name Product</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
{{--            @if($orders->order_status == 'New order')--}}
            <th scope="col">Total</th>
{{--                @endif--}}
        </tr>
        </thead>
        <tbody>
        @foreach($DetailOrders as $Detail)
        <tr>
            <td>{{$Detail->product_name}}</td>
            <td>${{$Detail->product_price}}</td>
{{--            @if($orders->order_status == 'New order')--}}
            <td>{{$Detail->product_sales_quantity}}</td>
            <td>${{ $Detail->product_sales_quantity * $Detail->product_price }}</td>
{{--            @else--}}
{{--                <td>{{$Detail->product_sales_quantity}}</td>--}}
{{--            @endif--}}

        </tr>
        @endforeach
        <tr>
            <th colspan="2">Status:
            @if($orders->order_status == 'New order')
                    Orders are waiting for confirmation
            @elseif($orders->order_status == 'Cancel')
                    Order is canceled
            @elseif($orders->order_status == 'Processing')
                    Order is being shipped
            @elseif($orders->order_status == 'Processed')
                    Order completed
                @endif
            </th>
            @if($orders->order_status == 'New order')
            <td colspan="2">Total: ${{$orders->order_total}}</td>
            @else
                <th>Total: ${{$orders->order_total}}</th>
            @endif
            <td></td>
        </tr>
        @if ($orders->order_status == 'New order')
            <tr>
                <td colspan="4">
                    <a class='btn btn-danger col-md-12' href="{{route('order_Cancel',['id'=>$orders->order_id])}}">Cancel order</a>
                </td>
            </tr>
        @endif


        </tbody>
    </table></div>
</div>
<div class="col-md-2"></div>
</div>
<hr>

