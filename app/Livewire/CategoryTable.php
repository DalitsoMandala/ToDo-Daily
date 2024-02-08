<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\TaskCategory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Detail;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class CategoryTable extends PowerGridComponent
{
    use WithExport;
    public bool $showFilters = true;
    public  $task;

    public function setUp(): array
    {

        $this->task = Task::all();
        //    $this->showCheckBox();

        return [

            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),

            Detail::make()
                ->view('categoryView')

                ->showCollapseIcon(),
        ];
    }

    protected function getListeners(): array
    {
        return array_merge(
            parent::getListeners(),
            [
                'refresh'   => '$refresh',

            ]
        );
    }

    #[On('saved')]
    public function save()
    {
        $this->dispatch('refresh');
    }

    public function datasource(): Collection
    {
        $data = TaskCategory::query()->where('user_id', auth()->user()->id)->with(['tasks'])->withCount([
            'tasks as total_tasks',
            'tasks as completed_tasks' => function ($query) {
                $query->where('status', '=', 'completed');
            },

        ])->select(['*',      DB::raw('CASE
            WHEN status = 0 THEN "inprogress"
            WHEN status = 1 THEN "completed"
            WHEN status = 2 THEN "overdue"
            ELSE "Unknown"
        END as stats'),]);

        $data = new Collection($data->get()->toArray());

        return $data;
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('name')
            ->addColumn('status')
            ->addColumn('status_label', function ($model) {
                // $code =   TaskCategory::codes()->firstWhere('code', $model->status)['label'];

                if ($model->stats === 'inprogress') {
                    $model->stats = '<span class="badge bg-warning">' . $model->stats . '</span>';
                }


                if ($model->stats === 'completed') {
                    $model->stats = '<span class="badge bg-success">' . $model->stats . '</span>';
                }


                if ($model->stats === 'overdue') {
                    $model->stats = '<span class="badge bg-danger">' . $model->stats . '</span>';
                }


                return $model->stats;
            })
            ->addColumn('due_date')
            ->addColumn('due_date_formatted', fn ($model) => Carbon::parse($model->due_date)->format('d/m/Y'))
            ->addColumn('created_at')
            ->addColumn('updated_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Name', 'name')
                ->sortable()

                ->searchable(),

            Column::make('Category', 'status_label', 'stats')
                ->sortable()
                ->searchable(),

            Column::make('Due date', 'due_date_formatted', 'due_date')
                ->sortable(),



            Column::action('Actions'),


        ];
    }


    public function filters(): array
    {
        return [
            Filter::inputText('Name', 'name')
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions($row): array
    {

        return [
            Button::add('edit')
                ->slot('<i class="bx bx-edit-alt"></i>')
                ->id()
                ->class('btn btn-primary')
                ->dispatch('editCategoryModal', ['rowId' => $row['id'], 'name' => $row['name'], 'dueDate' => $row['due_date'], 'status' => $row['stats']]),

            Button::add('delete')
                ->slot('<i class="bx bx-trash"></i>')
                ->id()
                ->class('btn btn-danger')
                ->dispatch('deleteCategoryModal', ['rowId' => $row['id']])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
