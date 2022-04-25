<x-admin-layout>
    <x-slot name="title">{{ __('Checklist Groups') }}</x-slot>
    <x-slot name="page">{{ __('Edit checklist group') }}</x-slot>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <form method="post"
                            action="{{ route('admin.checklist_groups.update', $checklistGroup->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ __('Name') }}</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value=" {{ $checklistGroup->name }}">
                                    @error('name')
                                        <div class="mt-1 text-red text-sm">{{ $message }}</div>
                                    @enderror
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
