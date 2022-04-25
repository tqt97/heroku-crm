<x-admin-layout>
    <x-slot name="title">{{ __('Page') }}</x-slot>
    <x-slot name="page">{{ __('Edit page') }}</x-slot>
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
                    @if (session('message'))
                        <div class="alert rounded alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">
                                {{ __('Edit page') }}
                            </h5>
                        </div>
                        <form method="post" action="{{ route('admin.pages.update', $page) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ __('Title') }}</label>
                                    <input type="text" name="title" class="form-control"
                                        value=" {{ $page->title }}">
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Content') }}</label>
                                    <textarea name="content" id="editor" class="form-control" rows="4">{!! $page->content !!}</textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
                            </div>
                        </form>
                        {{-- <form action="{{ route('admin.pages.destroy', $page->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="card-footer">
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this ?')"
                                    class="btn btn-danger">
                                    <i class="fas fa-trash-alt mr-1"></i>
                                    {{ __('Delete this page') }}
                                </button>
                            </div>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('custom_js')
        @include('layouts.partials.admin.ckeditor')
    @endpush
</x-admin-layout>
