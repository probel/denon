@foreach ($items as $item)
<strong>{{ $item['product']['name'] ?? '' }}</strong><br>
@if ($item['variation'] ?? null)
цвет: <strong>{{ $item['variation']['title'] }}</strong><br>
@endif
количество: <strong>{{ $item['qty'] ?? 0 }}</strong>, по цене <strong>{{ $item['price'] ?? 0 }} РУБ</strong><br>
на сумму: <strong>{{ $item['total'] ?? 0 }} РУБ</strong>
@if (!$loop->last)
<hr>
@endif
@endforeach
