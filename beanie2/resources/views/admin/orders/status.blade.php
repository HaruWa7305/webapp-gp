<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status</title>
</head>
<body>

    <h1>Your Order Status</h1>

    @if($orders->isEmpty())
        <p>You have no orders yet.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->product_name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</body>
</html>
