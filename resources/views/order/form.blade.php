@extends('layouts.app')
@section('content')
<form method="POST" action="{{ route('order.store') }}">
    @csrf
    <div class="mb-3">
        <label for="form-name" class="form-label">ФИО</label>
        <input type="text" class="form-control" id="form-name" name="name" value="{{ old('name') }}" />
    </div>
    <div class="mb-3">
        <label for="form-comment" class="form-label">Комментарий клиента</label>
        <textarea class="form-control" id="form-comment" name="comment">{{ old('comment') }}</textarea>
    </div>
    <div class="mb-3">
        <label for="form-article" class="form-label">Артикул товара</label>
        <input type="text" class="form-control" id="form-article" name="article" value="{{ old('article') }}" />
    </div>
    <div class="mb-3">
        <label for="form-manufacturer" class="form-label">Бренд товара</label>
        <input type="text" class="form-control" id="form-manufacturer" name="manufacturer" value="{{ old('manufacturer') }}" />
    </div>

    <button type="submit" class="btn btn-primary">Сделать заказ</button>
</form>
@endsection
