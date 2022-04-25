<x-admin-layout>
    <x-slot name="title">{{ __('Checklist') }}</x-slot>
    <x-slot name="page">{{ __('Edit checklist ') }}</x-slot>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @if ($errors->storeChecklist->any())
                        <div class="py-1 mb-3 rounded alert-warning">
                            <ul class="mb-0">
                                @foreach ($errors->storeChecklist->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0"> {{ __('Edit checklist') }} </h5>
                        </div>
                        <form method="post"
                            action="{{ route('admin.checklist_groups.checklists.update', [$checklistGroup, $checklist]) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ __('Name') }}</label>
                                    <input type="text" name="name" class="form-control"
                                        value=" {{ $checklist->name }}">

                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-1"></i>
                                    {{ __('Save Changes') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="mt-11 mb-3">
                        <form
                            action="{{ route('admin.checklist_groups.checklists.destroy', [$checklistGroup, $checklist]) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <div class="mt-6 mb-6">
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this ?')"
                                    class="btn btn-danger">
                                    <i class="fa fa-trash-alt mr-1"></i>
                                    {{ __('Delete this checklist') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4">
                            @if ($errors->storeTask->any())
                                <div class="py-1 mb-3 rounded alert-warning">
                                    <ul class="mb-0">
                                        @foreach ($errors->storeTask->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card card-warning card-outline">
                                <div class="card-header">
                                    <h5 class="m-0"> {{ __('New tasks') }} </h5>
                                </div>
                                <form method="post"
                                    action="{{ route('admin.checklists.tasks.store', [$checklist]) }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>{{ __('Task name') }}</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name') }}" placeholder="{{ __('Task name') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('Description') }}</label>
                                            <textarea name="description" id="editor" class="form-control" rows="10">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save mr-1"></i>
                                            {{ __('Add new task') }}
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="col-lg-8">
                            <div class="card card-info card-outline">
                                <div class="card-header">
                                    <h3 class="card-title"> {{ __('List of tasks') }}</h3>
                                </div>
                                @livewire('tasks-table',['checklist'=>$checklist])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('custom_js')
        @include('layouts.partials.admin.ckeditor')
    @endpush
</x-admin-layout>
