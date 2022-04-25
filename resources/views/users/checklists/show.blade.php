<x-admin-layout>
    <x-slot name="title">{{ __('Show') }}</x-slot>
    <x-slot name="page">{{ __('Show') }}</x-slot>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @livewire('header-totals-count',['checklist_group_id'=>$checklist->checklist_group_id])
                    @livewire('checklist-show', ['checklist' => $checklist])
                </div>
            </div>
        </div>
        <style>
            .toggle-content {
                margin-top: 1px;
                margin-bottom: 1px;
                padding: 10px;
                border-radius: 5px;
                background-color: #ffffff;
                box-shadow: 0 0 5px #ccc;
                border-top: 2px solid rgb(0, 139, 204);
            }

            .done {
                background-color: #dff0d8;
                line-through: 1;
            }

        </style>
    </div>

</x-admin-layout>
