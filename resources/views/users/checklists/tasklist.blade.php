<x-admin-layout>
    <x-slot name="title">{{ __('Details') }}</x-slot>
    <x-slot name="page">{{ __('Details') }}</x-slot>
    <div class="content">
        <div class="container-fluid">
            <div class="fade-in">
                @livewire('checklist-show', ['list_type' => $list_type])
            </div>
        </div>
    </div>
</x-admin-layout>
