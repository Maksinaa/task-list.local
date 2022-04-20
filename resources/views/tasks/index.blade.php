@extends('layouts.app')

@section('content')
<div class="card">
  <h3 class="card-header p-3">
    Список задач
    <a class="btn btn-sm btn-success float-right" href="{{ route('tasks.create') }}">
      Добавить задачу
    </a>
  </h3>
  <div class="card-body">
    <table class="table table-sm">
      <thead>
        <tr>
          <th scope="col">Задача</th>
          <th scope="col" class="text-center">Приоритет</th>
          <th scope="col" class="text-end">Действия</th>
        </tr>
      </thead>
      <tbody>
        @forelse($tasks as $task)
        <tr>
          <td>{{ $task->name }}</td>
          <td class="text-center">{{ $task->priority }}</td>
          <td class="text-end">
            <a class="btn btn-sm btn-primary me-1" href="{{ route('tasks.show', $task->id) }}">
              Просмотреть
            </a>
            <a class="btn btn-sm btn-secondary" href="{{ route('tasks.edit', $task->id) }}">
              Редактировать
            </a>&nbsp;
            <form action="{{ route('tasks.destroy', $task->id) }}" method="post" class="d-inline">
              @csrf
              @method('delete')
              <button class="btn btn-sm btn-danger" type="submit">Удалить</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="3">
            <h3 class="text-center">Текущие задачи отсутствуют</h3>
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
