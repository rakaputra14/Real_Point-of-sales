<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Stok</th>
                <th scope="col">Kategori</th>
                <th scope="col">Harga</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($datas as $data)
                <tr>
                    <td>{{ $data->product_name }}</td>
                    <td>{{ $data->product_qty }}</td>
                    <td>{{ $data->category->category_name }}</td>
                    <td>Rp {{ number_format($data->product_price, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Tidak ada data tersedia</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>