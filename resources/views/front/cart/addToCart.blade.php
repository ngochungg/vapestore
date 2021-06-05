<form action="/add_to_cart" method="POST">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
</form>
