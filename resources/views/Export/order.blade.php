<table>
    <thead>
    <tr>
        <th>name</th>
        <th>Quantity</th>
        <th>Product</th>
        <th>Price</th>
        <th>Total price</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->quantity }}</td>
            <td>{{ $order->product->title  }}</td>
            <td>{{ $order->product->price . __('message.mmk')  }}</td>
            <td>{{ $order->quantity * $order->product->price . __('message.mmk') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>