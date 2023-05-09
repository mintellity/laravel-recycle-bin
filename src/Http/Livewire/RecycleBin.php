<?php

namespace Mintellity\LaravelRecycleBin\Http\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Mintellity\LaravelRecycleBin\LaravelRecycleBin;

class RecycleBin extends Component
{
    public string $selectedModel = '';

    public function render(): View
    {
        if ($this->selectedModel !== '')
            $trashedItems = LaravelRecycleBin::showTrashed($this->selectedModel)->simplePaginate();
        else
            $trashedItems = new Paginator([], 1);

        return view('recycle-bin::livewire.recycle-bin', [
            'recycleModels' => config('recycle-bin.recycle-models'),
            'trashedItems' => $trashedItems,
        ]);
    }

    public function restore(string $id): void
    {
        $this->selectedModel::withTrashed()->find($id)->restore();
    }

    public function forceDelete(string $id): void
    {
        $this->selectedModel::withTrashed()->find($id)->forceDelete();
    }
}
