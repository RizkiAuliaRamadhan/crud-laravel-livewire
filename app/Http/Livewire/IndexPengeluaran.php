<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\pengeluaran;
use Livewire\WithPagination;

class IndexPengeluaran extends Component
{
    use WithPagination;

    public $pengeluaran;
    public $pengeluaranId, $nominal, $keterangan, $updated_at;
    public $openAlert = 0;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // $this->pengeluaran = pengeluaran::all();
        $pagination = pengeluaran::orderBy('updated_at', 'desc')->where('keterangan', 'like', '%'.$this->search.'%')->paginate(5);

        return view('livewire.index-pengeluaran', compact('pagination'));
    }

    public function showAlert()
    {
        $this->openAlert = true;
    }

    public function closeAlert()
    {
        $this->openAlert = false;
    }

    public function createOrUpdate()
    {
        $this->validate([
            'nominal' => 'required',
            'keterangan' => 'required',
            'updated_at' => 'required',
        ]);

        pengeluaran::updateOrCreate(['id' => $this->pengeluaranId],
        [
            'nominal' => $this->nominal,
            'keterangan' => $this->keterangan,
            'updated_at' => $this->updated_at
        ]);

        session()->flash('info', $this->pengeluaranId ? 'Berhasil di update' : 'Berhasil di tambah');

        $this->closeAlert();

        $this->pengeluaranId = '';
        $this->nominal = '';
        $this->keterangan = '';
        $this->updated_at = '';
    }

    public function edit($id)
    {
        $pengeluaranId = pengeluaran::find($id);
        $this->showAlert();

        $this->pengeluaranId = $pengeluaranId->id;
        $this->nominal = $pengeluaranId->nominal;
        $this->keterangan = $pengeluaranId->keterangan;
        $this->updated_at = $pengeluaranId->update_at;
    }

    public function delete($id){
        pengeluaran::find($id)->delete();
        session()->flash('delete', 'Berhasil di hapus');
    }
}
