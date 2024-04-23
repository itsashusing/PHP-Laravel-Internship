<h1>All Prodcuts</h1>

@foreach ($products as $product)
    <h4> {{ $product->name }} || {{ $product->discriptions }} || <a
            href="{{ route('view.singleproduct', $product->id) }}">View</a></h4>
@endforeach
