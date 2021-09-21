<table>
    <thead>
    <tr>
        <th>title</th>
        <th>description</th>
        <th>price</th>
        <th>old_price</th>
        <th>weight</th>
        <th>seo_title</th>
        <th>seo_description</th>
        <th>images</th>
        <th>slug</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->title }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->old_price }}</td>
            <td>{{ $product->weight }}</td>
            <td>{{ $product->seo->title }}</td>
            <td>{{ $product->seo->description }}</td>

            <td>@if(isset($product->images[0])) {{ $product->images[0]->image_path }}@endif</td>

            <td>/product/{{ $product->seo->slug }}</td>
        </tr>
    @endforeach
    </tbody>
</table>