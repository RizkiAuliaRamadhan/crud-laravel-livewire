<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\pemasukan;
use Livewire\WithPagination;

class IndexPemasukan extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $pemasukan;
    public $pemasukanId, $nominal, $keterangan, $updated_at;
    public $openAlert = 0;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // $this->pemasukan = pemasukan::all();
        $pagination = pemasukan::orderBy('updated_at', 'desc')->where('keterangan', 'like', '%'.$this->search.'%')->paginate(5);

        return view('livewire.index-pemasukan', compact('pagination'));
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

        pemasukan::updateOrCreate(['id' => $this->pemasukanId],
        [
            'nominal' => $this->nominal,
            'keterangan' => $this->keterangan,
            'updated_at' => $this->updated_at
        ]);

        session()->flash('info', $this->pemasukanId ? 'Berhasil di update' : 'Berhasil di tambah');

        $this->closeAlert();

        $this->pemasukanId = '';
        $this->nominal = '';
        $this->keterangan = '';
        $this->updated_at = '';
    }

    public function edit($id)
    {
        $pemasukanId = pemasukan::find($id);
        $this->showAlert();

        $this->pemasukanId = $pemasukanId->id;
        $this->nominal = $pemasukanId->nominal;
        $this->keterangan = $pemasukanId->keterangan;
        $this->updated_at = $pemasukanId->update_at;
    }

    public function delete($id)
    {
        pemasukan::find($id)->delete();
        session()->flash('delete','Berhasil di hapus');
    }
}
