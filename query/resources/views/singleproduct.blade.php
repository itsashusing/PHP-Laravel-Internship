<h1>Product Details</h1>

@foreach ($products as $product)
    <h4> {{ $product->name }} || {{ $product->discriptions }} </h4>
@endforeach
