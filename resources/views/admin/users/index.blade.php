<x-admin-layout>
    <x-slot name="title">{{ __('Users') }}</x-slot>
    <x-slot name="page">{{ __('Edit user') }}</x-slot>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @if ($errors->storeTask->any())
                        <div class="py-1 mb-3 rounded alert-warning">
                            <ul class="mb-0">
                                @foreach ($errors->storeTask->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title"> {{ __('List of users') }}</h3>
                        </div>
                        <div>
                            <div class="card-body">
                                <table class="table table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Website</th>
                                            <th>Created at</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody wire:sortable="updateTaskOrder">
                                        @foreach ($users as $index => $user)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->website }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('admin.users.edit', [$user]) }}">
                                                        <button class="btn btn-primary btn-sm">
                                                            <i class="fas fa-edit"></i>
                                                            {{ __('Edit') }}
                                                        </button>
                                                    </a>
                                                    <form style="display: inline-block"
                                                        action="{{ route('admin.users.destroy', [$user]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Are you sure you want to delete this ?')"
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
                            <div class="card-footer clearfix">
                                {{ $users->links() }}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
