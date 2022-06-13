<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ExportButton extends Component
{

    public $file = '';

    public function export()
    {
        return Storage::disk('perfiles')->download($this->file);
    }

    public function render()
    {
        return view('livewire.export-button');
    }
}
