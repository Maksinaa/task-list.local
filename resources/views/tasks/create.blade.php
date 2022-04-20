@extends('layouts.app')

@section('content')

<div class="card">
  <h3 class="card-header">
    Добавить задачу
  </h3>
  <div class="card-body">
    <form action="{{ route('tasks.store') }}" method="post">
      @csrf

      @include('tasks.partials.form')
    </form>
  </div>
</div>

@endsection

