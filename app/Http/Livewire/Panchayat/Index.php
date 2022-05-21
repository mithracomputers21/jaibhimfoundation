<?php

namespace App\Http\Livewire\Panchayat;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Panchayat;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Panchayat())->orderable;
    }

    public function render()
    {
        $query = Panchayat::with(['block'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $panchayats = $query->paginate($this->perPage);

        return view('livewire.panchayat.index', compact('panchayats', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('panchayat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Panchayat::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Panchayat $panchayat)
    {
        abort_if(Gate::denies('panchayat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $panchayat->delete();
    }
}
