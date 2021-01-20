<div class="py-2">
    <h2 class="text-center">Pemasukan</h2>

    <div class="row">
        <div class="col-4">
            <button wire:click="showAlert()" type="button" class="btn btn-primary">
                Create
            </button>
        </div>
        <div class="col-4">
            <div wire:loading>
                <span class="badge badge-light">Loading...</span>
            </div>
        </div>
        <div class="col-2"></div>
        <div class="col-2">
            <input type="text"  class="form-control" placeholder="Search" wire:model="search" />
        </div>
    </div>

    @if ($openAlert === true)
        @include('form.pemasukan')
    @endif

    @if (session()->has('info'))
        <br>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @if (session()->has('delete'))
        <br>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>{{session('delete')}}</strong>
        </div>
    @endif

    <table class="table table-striped">
        <thead class="">
            <tr>
                <th>#</th>
                <th>Nominal</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($pagination as $p)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{number_format($p->nominal)}}</td>
                        <td>{{$p->keterangan}}</td>
                        <td>{{ date("d - F - Y", strtotime($p->updated_at)) }}</td>
                        <td>
                            <button wire:click="edit({{$p->id}})" class="btn btn-info">Update</button> |
                            <button wire:click="delete({{$p->id}})" class="btn btn-warning">Delete</button>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Data Kosong!</strong>
                    </div>
                @endforelse
            </tbody>
    </table>
    {{ $pagination->links()}}
</div>
