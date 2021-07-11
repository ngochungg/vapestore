<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Order code</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Order Total</th>
                        <th scope="col">Order Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($all_order as $key => $order)
                        <tr>
                            <td>{{ $order->order_code }}</td>
                            <td>{{ $order-> name }}</td>
                            <td>$ {{ $order->order_total }}</td>
                            <td>{{ $order->order_status }}</td>
                            <td>
                                <a href="{{route('order.details/{orderId}',['id'=>$order->order_id])}}"
                                   class="btn btn-default"><i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            {{--                    <div class="col-md12 mx-auto">--}}
            {{--                        {{ $orders->links('pagination::bootstrap-4') }}--}}
            {{--                    </div>--}}

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelir.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
