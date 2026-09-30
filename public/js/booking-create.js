let rowIndex = 0;

function formatRupiah(angka) {
    return 'Rp' + new Intl.NumberFormat('id-ID').format(angka);
}

function tambahBarisLayanan() {
    const container = document.getElementById('daftar-layanan');
    const index = rowIndex++;

    let options = '<option value="">-- Pilih Layanan --</option>';
    daftarLayanan.forEach(l => {
        options += `<option value="${l.id_layanan}" data-harga="${l.harga}">${l.nama_layanan} (Rp${l.harga}/${l.satuan})</option>`;
    });

    const div = document.createElement('div');
    div.className = 'row-layanan row g-2 align-items-center';
    div.innerHTML = `
        <div class="col-6">
            <select name="layanan[${index}][id_layanan]" class="form-select select-layanan" required>
                ${options}
            </select>
        </div>
        <div class="col-3">
            <input type="number" step="0.1" min="0.1" name="layanan[${index}][jumlah]" class="form-control input-jumlah" placeholder="Jumlah" required>
        </div>
        <div class="col-2">
            <span class="subtotal-text">Rp0</span>
        </div>
        <div class="col-1">
            <button type="button" class="btn btn-sm btn-outline-danger btn-hapus-baris">&times;</button>
        </div>
    `;
    container.appendChild(div);

    const selectLayanan = div.querySelector('.select-layanan');
    const inputJumlah = div.querySelector('.input-jumlah');
    const subtotalText = div.querySelector('.subtotal-text');
    const btnHapus = div.querySelector('.btn-hapus-baris');

    function hitungSubtotalBaris() {
        const selected = selectLayanan.options[selectLayanan.selectedIndex];
        const harga = parseFloat(selected?.dataset?.harga || 0);
        const jumlah = parseFloat(inputJumlah.value || 0);
        subtotalText.textContent = formatRupiah(harga * jumlah);
        hitungTotal();
    }

    selectLayanan.addEventListener('change', hitungSubtotalBaris);
    inputJumlah.addEventListener('input', hitungSubtotalBaris);
    btnHapus.addEventListener('click', function () {
        div.remove();
        hitungTotal();
    });
}

function hitungTotal() {
    let total = 0;
    document.querySelectorAll('#daftar-layanan .row-layanan').forEach(row => {
        const select = row.querySelector('.select-layanan');
        const input = row.querySelector('.input-jumlah');
        const selected = select.options[select.selectedIndex];
        const harga = parseFloat(selected?.dataset?.harga || 0);
        const jumlah = parseFloat(input.value || 0);
        total += harga * jumlah;
    });
    document.getElementById('total-display').textContent = formatRupiah(total);
}

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('btn-tambah-layanan').addEventListener('click', tambahBarisLayanan);
    tambahBarisLayanan();
});