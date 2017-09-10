@component('mail::message')
# Thanks for buy Product from {{ config('app.name') }}

Your Order is is placed .
Please give us some time to deliver the products to you.

@component('mail::panel')
Your Order id is {{ $order->id }} <br>
You Purchased total {{ count($order->products) }} Items<br>
Your Total cost ${{ $order->total }}<br>

@component('mail::table')
| Product Name     | Quantity                   | price    |
@foreach ($order->products as $product)
| -----------------|:---------------------------| --------:|
|{{$product->name}}| {{ $product->pivot->qty }} |${{ $product->pivot->total }}  |
@endforeach
@endcomponent

@endcomponent
@component('mail::button', ['url' =>route('order')])
View your Orders
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
