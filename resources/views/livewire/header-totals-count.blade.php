<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                {{ __('Store Review') }}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="row"> 
                            @foreach ($checklists as $checklist)
                                <div class="col-sm-3">
                                    <strong>{{ $checklist->name }}</strong>
                                    <strong>{{ $checklist->user_tasks_count }}/{{ $checklist->tasks_count }}</strong>
                                    <div class="progress progress-sm mt-2">
                                        @if ($checklist->tasks_count > 0)
                                            <div class="progress-bar bg-success progress-bar-striped" role="progressbar"
                                                aria-valuenow="{{ ($checklist->user_tasks_count / $checklist->tasks_count) * 100 }}"
                                                aria-valuemin="0" aria-valuemax="100"
                                                style="width: {{ ($checklist->user_tasks_count / $checklist->tasks_count) * 100 }}%">
                                                <span class="sr-only1">
                                                    {{ ($checklist->user_tasks_count / $checklist->tasks_count) * 100 }}%
                                                    Complete
                                                </span>
                                            </div>
                                        @else
                                            <div class="progress-bar bg-success progress-bar-striped" role="progressbar"
                                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 0%">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h2>{{ $checklists->sum('user_tasks_count') }}/{{ $checklists->sum('tasks_count') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
