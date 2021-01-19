<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\pemasukan;
use App\Models\pengeluaran;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $pemasukan, $pengeluaran, $saldo;

    public function render()
    {
        // $this->pemasukan = DB::select('select sum(nominal) from pemasukans');
        $this->pemasukan = pemasukan::get('nominal')->sum('nominal');
        $this->pengeluaran = pengeluaran::get('nominal')->sum('nominal');
        $this->saldo = $this->pemasukan - $this->pengeluaran;

        return view('livewire.dashboard');
    }
}
