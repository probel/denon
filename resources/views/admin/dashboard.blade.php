<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box info-box-small">
            <span class="info-box-icon bg-aqua"><i class="fa fa-product-hunt"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Товаров</span>
                <span class="info-box-number">{{ $counts['products'] }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box info-box-small">
            <span class="info-box-icon bg-red"><i class="fa fa-fw fa-file-image-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Городов</span>
                <span class="info-box-number">{{ $counts['cities'] }}</span>
            </div>
        </div>
    </div>
    <div class="clearfix visible-sm-block"></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box info-box-small">
            <span class="info-box-icon bg-yellow"><i class="fa fa-fw fa-quote-right"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Отзывов</span>
                <span class="info-box-number">{{ $counts['reviews']  }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box info-box-small">
            <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Всего заказов</span>
                <span class="info-box-number">{{  $counts['orders']}}</span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Последние <a href="/admin/orders">заказы</a></h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table no-margin no-head-bg">
                        <thead>
                        <tr>
                            <th>Код заказа</th>
                            <th>Дата</th>
                            <th>Товары</th>
                            <th>Сумма</th>
                            <th>Статус</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            @php
                            /** @var $order \App\Models\Order */
                            @endphp
                            <tr>
                                <td>
                                    {{ $order->id }}
                                </td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    @foreach($order->items as $item)
                                    <a href="/admin/products/{{$item->product_id}}/edit">{{$item->product->name}}</a> - {{$item->count}} шт.<br>    
                                    @endforeach
                                </td>
                                <td>{{ $order->price }} ₽</td>
                                <td>
                                    @php
                                        $status = '';
                                        switch ($order->status) {
                                            case 'new':
                                                $status = 'Новый';
                                                break;
                                            case 'complited':
                                                $status = 'Обработан';
                                                break;
                                            default:
                                                $status = $order->status;
                                        }
                                    @endphp
                                    <span class="label label-{{$order->status=="complited"?'success':'info'}}">{{ $status }}</span>
                                </td>
                                <td>
                                    <a class="btn btn-primary" style="padding: 0px 11px;" href="/admin/orders/{{$order->id}}/edit">Перейти к заказу</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Последние <a href="/admin/callbacks">запросы</a></h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table no-margin no-head-bg">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Тип</th>
                            <th>Дата</th>
                            <th>Клиент</th>
                            <th>Сообщение</th>
  
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($callbacks as $callback)
                            <tr>
                                <td>{{ $callback->id }}</td>
                                <td>{{ $callback->type }}</td>
                                <td>{{ $callback->created_at }}</td>
                                <td>
                                    Имя: {{ $callback->name }}<br>
                                    Телефон: {{ $callback->phone }}<br>
                                    Email: {{ $callback->email }}<br>
                                    Город: {{ $callback->city }}<br>
                                    IP: {{ $callback->ip }}
                                </td>
                                <td>{{ $callback->message }}</td>
                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Новые <a href="/admin/reviews">отзывы</a></h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table no-margin no-head-bg">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Клиент</th>
                            <th>Сообщение</th>
                            <th>Дата</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reviews as $review)
                            <tr>
                                <td>{{ $review->id }}</td>
                                <td>{{ $review->name }}<br>
                                {{ $review->phone }}</td>
                                <td>{{ $review->message }}</td>
                                <td>{{ $review->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
