@extends('layouts.layout')

@section('title', 'Create Product')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="section__title">
                Create new product
            </h1>

            @include('components.errors')

            <form
                action="{{ route('product.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf

                <input type="text" name="name" placeholder="Название продукта">
                <input type="text" name="short_text" placeholder="Краткое описание">
                <input type="text" name="price" placeholder="Введите стоимость">
                <input type="number" name="quantity" placeholder="Введите кол-во товара">
                <input type="file" name="image_path">
                <label for="">
                    <input type="checkbox" checked name="is_published">
                    Опубликовать товар?
                </label>

                <textarea name="text" placeholder="Описание продукта"></textarea>

                <select name="collection_id">
                    @foreach($collections as $item)
                        <option value="{{$item->id}}">{{$item->name}} - {{$item->products()->count()}} шт.</option>
                    @endforeach
                </select>

                <button type="submit">Create new product</button>

            </form>
        </div>
    </section>
@endsection
