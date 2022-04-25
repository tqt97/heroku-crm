<div>
    <div class="card-body">
        <table class="table table-responsive-sm" wire:loading.class="text-muted">
            <thead>
                <tr>
                    <th></th>
                    {{-- <th style="width: 10px">#</th> --}}
                    <th>Task</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $index => $task)
                    <tr>
                        <td style="font-size: 1.2rem">
                            @if ($task->position > 1)
                                <a wire:click.prevent="task_up({{ $task->id }})" class="px-2" href="#">
                                    &uarr;
                                </a>
                            @endif
                            @if ($task->position < $tasks->max('position'))
                                <a wire:click.prevent="task_down({{ $task->id }})" class="px-2" href="#">
                                    &darr;
                                </a>
                            @endif
                        </td>
                        {{-- <td>{{ $tasks->firstItem() + $index }}</td> --}}
                        <td>{{ $task->name }}</td>
                        <td>
                            <a href="{{ route('admin.checklists.tasks.edit', [$checklist, $task]) }}">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                    {{ __('Edit') }}
                                </button>
                            </a>
                            <form style="display: inline-block"
                                action="{{ route('admin.checklists.tasks.destroy', [$checklist, $task]) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this ?')"
                                    class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash-alt mr-1"></i>
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- <div class="card-footer clearfix">
        {{ $tasks->links() }}
    </div> --}}
    <style>
        .draggable-mirror {
            /* background-color: rgba(255, 255, 255, 0.763); */
            /* width: 950px; */
            /* display: flex; */
            /* justify-content: space-between; */
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

    </style>
</div>
