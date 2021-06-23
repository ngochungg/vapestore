
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
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Mark</td>
            <td>Otto</td>
            <td >@mdo</td>
        </tr>
        <tr>
            <td colspan="3">Total: ${{$orders->order_total}}</td>
        </tr>

        </tbody>
    </table></div>
</div>
<div class="col-md-2"></div>
</div>
<hr>

