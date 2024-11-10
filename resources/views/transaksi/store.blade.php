<form action="{{ route('transaksi.store') }}" method="POST">
    @csrf
    <input type="hidden" name="pesanan_id" value="{{ $pesanan->id }}">
    <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
    <!-- Pastikan id_user dikirimkan jika autentikasi ada -->

    <div class="mb-4">
        <label for="payment_amount" class="block text-gray-700">Jumlah Pembayaran</label>
        <input type="number" id="payment_amount" name="payment_amount" class="mt-1 block w-full" min="0" required>
    </div>

    <div class="mb-4">
        <label for="payment_method" class="block text-gray-700">Metode Pembayaran</label>
        <input type="text" id="payment_method" name="payment_method" class="mt-1 block w-full" required>
    </div>

    <button type="submit" class="btn btn-primary">Bayar</button>
</form>