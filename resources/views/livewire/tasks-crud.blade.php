<div class="p-4">

    <button wire:click="create" class="bg-blue-500 text-white px-4 py-2 rounded">Shto Task</button>

    @if (session()->has('message'))
        <div class="bg-green-200 text-green-800 p-2 mt-2 rounded">{{ session('message') }}</div>
    @endif

    <table class="table-auto w-full mt-4 border">
        <thead>
            <tr>
                <th class="border px-2 py-1">ID</th>
                <th class="border px-2 py-1">Title</th>
                <th class="border px-2 py-1">Description</th>
                <th class="border px-2 py-1">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td class="border px-2 py-1">{{ $task->id }}</td>
                    <td class="border px-2 py-1">{{ $task->title }}</td>
                    <td class="border px-2 py-1">{{ $task->description }}</td>
                    <td class="border px-2 py-1">
                        <button wire:click="edit({{ $task->id }})" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                        <button wire:click="delete({{ $task->id }})" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($isModalOpen)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-4 rounded w-1/3">
                <h2 class="text-lg mb-2">{{ $task_id ? 'Edit Task' : 'Create Task' }}</h2>
                <input type="text" wire:model="title" placeholder="Title" class="border p-1 w-full mb-2">
                <textarea wire:model="description" placeholder="Description" class="border p-1 w-full mb-2"></textarea>

                <button wire:click="store" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                <button wire:click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
            </div>
        </div>
    @endif

</div>
