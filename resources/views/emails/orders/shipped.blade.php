<h3>Клиент:</h3>
@if($order->name)
Имя: <strong>{{ $order->name }}</strong><br>
@endif
@if($order->phone)
Телефон: <strong>{{ $order->phone }}</strong><br>
@endif
@if($order->email)
Телефон: <strong>{{ $order->email }}</strong><br>
@endif
@if($order->address)
Адрес доставки: <strong>{{ $order->address }}</strong><br><br>
@endif
@if($order->comment)
Сообщение клиента: <strong>{{ $order->comment }}</strong><br><br>
@endif

<h3>Заказ:</h3>
@include('admin.table.orderItems',['items' => $order->items])
