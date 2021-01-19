<div class="alert alert-light shadow" role="alert">
    <form>
        <input type="hidden" wire:model="pengeluaranId">
        <div class="form-group">
            <label for="nominal">Nominal</label>
            <input type="number" name="nominal" id="nominal" class="form-control @error('nominal') is-invalid @enderror" placeholder="Rp." wire:model="nominal">
            @error('nominal')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" rows="4" wire:model="keterangan"></textarea>
            @error('keterangan')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="updated_at">Tanggal</label>
            <input type="date" name="updated_at" id="updated_at" class="form-control @error('updated_at') is-invalid @enderror" wire:model="updated_at">
            @error('updated_at')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
      </div>
      <div class="modal-footer">
        <button wire:click="closeAlert()" type="button" class="btn btn-secondary">Close</button>
        <button wire:click.prevent="createOrUpdate()" type="button" class="btn btn-primary" >Save</button>
      </div>
    </form>
</div>


