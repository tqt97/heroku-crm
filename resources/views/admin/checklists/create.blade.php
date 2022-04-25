<x-admin-layout>
    <x-slot name="title">{{ __('Checklist') }}</x-slot>
    <x-slot name="page">{{ __('Create checklist') }}</x-slot>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @if ($errors->any())
                        <div class="py-1 mb-3 rounded alert-warning">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card card-primary card-outline">
                        <form method="POST"
                            action="{{ route('admin.checklist_groups.checklists.store', $checklistGroup) }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ __('Name') }}</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                        placeholder="Enter checklist name">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
