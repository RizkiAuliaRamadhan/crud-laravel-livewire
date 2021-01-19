<div class="py-2">
    <h2 class="text-center">Dashboard</h2>

    <div class="row mt-5">
        <div class="col-4 p-1">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header"><h2 class="text-center">Saldo</h2></div>
                <div class="card-body">
                  <h3 class="card-title text-center">Rp. {{number_format($saldo)}}</h3>
                </div>
            </div>
        </div>
        <div class="col-4 p-1">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header"><h2 class="text-center">Pemasukan</h2></div>
                <div class="card-body">
                  <h3 class="card-title text-center">Rp. {{number_format($pemasukan)}}</h3>
                </div>
            </div>
        </div>
        <div class="col-4 p-1">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header"><h2 class="text-center">Pengeluaran</h2></div>
                <div class="card-body">
                  <h3 class="card-title text-center">Rp. {{number_format($pengeluaran)}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
