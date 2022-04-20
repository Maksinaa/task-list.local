<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
        /**
     * Просмотр списка задач
     *
     * @return View
     */
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())
            ->orderBy('priority', 'desc')
            ->get();

        return view('tasks.index', compact('tasks'));
    }


    /**
     * Вызов формы создания задачи
     *
     * @return View
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Сохранение новой задачи
     *
     * @param Request $request запрос
     *
     * @return RedirectResponse перенаправление
     */
    public function store(Request $request)
    {
        Task::create($request->all());

        return redirect()->route('tasks.index');
    }


        /**
     * Просмотр задачи
     *
     * @param int $id идентификатор задачи
     *
     * @return View
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.show', compact('task'));
    }

    /**
     * Вызов формы редактирования задачи
     *
     * @param int $id идентификатор задачи
     *
     * @return View
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));
    }


       /**
     * Обновление задачи
     *
     * @param Request $request запрос
     * @param int     $id      идентификатор задачи
     *
     * @return RedirectResponse перенаправление
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->except('user_id'));

        return redirect()->route('tasks.index');
    }

    /**
     * Удаление задачи
     *
     * @param int $id идентификатор задачи
     *
     * @return RedirectResponse перенаправление
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
