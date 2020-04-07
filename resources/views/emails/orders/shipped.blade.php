Способ доставки: <strong>@switch($order->delivery)
    @case('pickup')
        Самовывоз
        @break
    @case('post')
        Почта
        @break
    @case('address')
        Доставка курьером
        @break
    @default       
@endswitch</strong><br>
@if($order->fio)
Имя: <strong>{{ $order->fio }}</strong><br>
@endif
@if($order->phone)
Телефон: <strong>{{ $order->phone }}</strong><br>
@endif
@if($order->comment)
Сообщение клиента: <strong>{{ $order->comment }}</strong><br><br>
@endif
@if($order->address)
Адрес доставки: <strong>{{ $order->address }}</strong><br><br>
@endif
@if($order->city)
Город: <strong>{{ $order->city }}</strong><br>
@endif
<br>
@foreach ($order->items as $item)
Товар: (ID:{{ $item->product->id }}) <strong>{{ $item->product->name }}</strong><br>
Заказали: <strong>{{ $item->count }}</strong>шт. по <strong>{{ number_format($item->price/$item->count,0,'.',' ') }}</strong> {{ country()->currency }} на сумму: <strong>{{ number_format($item->price,0,'.',' ') }}</strong> {{ country()->currency }}<br><br>
@endforeach