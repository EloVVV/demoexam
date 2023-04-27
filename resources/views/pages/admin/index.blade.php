@extends('layouts.layout')

@section('title', 'Admin Panel')

@section('content')
    <section>
        <h1>AAAAAAdmin</h1>

        <div class="block">
            <div class="block__title">Orders</div>

            <div class="table-item table-title">
                <span>ID</span>
                <span>User</span>
                <span>Total</span>
                <span>Actions</span>
            </div>

            @foreach($orders as $order)
                <div class="table-item">
                    <span>{{$order->id}}</span>
                    <span>{{$order->user->full_name}}</span>
                    <span>{{$order->total}}</span>
                    <span>
                        @switch($order->status)
                            @case('new')
                                <a href="{{ route('order.toggle', [$order, 'status' => 'delivered']) }}">Delivered</a>
                                @break
                            @case('canceled')
                                <a href="{{ route('order.toggle', [$order, 'status' => 'delivered']) }}">Delivered</a>
                                @break
                            @case('completed')
                                <a href="{{ route('order.toggle', [$order, 'status' => 'canceled']) }}">Canceled</a>
                                @break
                            @case('delivered')
                                <a href="{{ route('order.toggle', [$order, 'status' => 'completed']) }}">Completed</a>
                                @break

                        @endswitch


                    </span>
                </div>
            @endforeach
        </div>

        <div class="block">
            <div class="block__title">Users</div>

            <div class="table-item table-title">
                <span>ID</span>
                <span>Name</span>
                <span>Products</span>
                <span>Actions</span>
            </div>

            @foreach($users as $item)
                <div class="table-item">
                    <span>{{$item->id}}</span>
                    <span>{{$item->name}}</span>
                    <span>
                        <a href="">Edit</a>
                        <a href="">Remove</a>
                    </span>
                </div>
            @endforeach
        </div>

        <div class="block">
            <div class="block__title">Collections</div>

            <div class="table-item table-title">
                <span>ID</span>
                <span>Name</span>
                <span>Products</span>
                <span>Actions</span>
            </div>

            @foreach($collections as $item)
                <div class="table-item">
                    <span>{{$item->id}}</span>
                    <span>{{$item->name}}</span>
                    <span>{{$item->products()->count()}}</span>
                    <span>
                        <a href="">Edit</a>
                        <a href="">Remove</a>
                    </span>
                </div>
            @endforeach
        </div>
    </section>
@endsection
