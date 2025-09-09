<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TasksCrud extends Component
{
    public $tasks, $title, $description, $task_id;
    public $isModalOpen = false;

    public function render()
    {
        $this->tasks = Task::all();
        return view('livewire.tasks-crud');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->task_id = null;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|string|max:255',
        ]);

        Task::updateOrCreate(['id' => $this->task_id], [
            'title' => $this->title,
            'description' => $this->description,
        ]);

        session()->flash('message', $this->task_id ? 'Task Updated Successfully.' : 'Task Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $this->task_id = $id;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->openModal();
    }

    public function delete($id)
    {
        Task::find($id)->delete();
        session()->flash('message', 'Task Deleted Successfully.');
    }
}
