@component('mail::message')
# Introduction

Your Order is is placed .
Please give us some time to delivered to you.

@component('mail::panel')
Your Order id is {{ $order->id }} <br>
You Purchased total {{ count($order->products) }} Items<br>
Your Total cost ${{ $order->total }}<br>
@foreach ($order->products as $product)
@component('mail::table')
| Product Name     | Quantity                   | price    |
| -----------------|:---------------------------| --------:|
|{{$product->name}}| {{ $product->pivot->qty }} |${{ $product->pivot->total }}  |
@endcomponent
@endforeach
@endcomponent
@component('mail::button', ['url' =>route('order')])
View your Orders
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
