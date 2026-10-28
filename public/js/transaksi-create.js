let rowIndex = 0;

function formatRupiah(angka) {
    return 'Rp' + new Intl.NumberFormat('id-ID').format(angka);
}

function tambahBarisLayanan() {
    const container = document.getElementById('daftar-layanan');
    const index = rowIndex++;

    let options = '<option value="">-- Pilih Layanan --</option>';
    daftarLayanan.forEach(l => {
        options += `<option value="${l.id_layanan}" data-harga="${l.harga}" data-satuan="${l.satuan}">${l.nama_layanan} — Rp${new Intl.NumberFormat('id-ID').format(l.harga)}/${l.satuan}</option>`;
    });

    const div = document.createElement('div');
    div.className = 'row-layanan';
    div.id = `row-${index}`;
    div.innerHTML = `
        <div class="row g-2 align-items-center">
            <div class="col-12 col-sm-5">
                <select name="layanan[${index}][id_layanan]" class="form-select select-layanan" required>
                    ${options}
                </select>
                <div class="satuan-label sel-satuan-label"></div>
            </div>
            <div class="col-7 col-sm-4">
                <input type="number" step="0.1" min="0.1"
                    name="layanan[${index}][jumlah]"
                    class="form-control input-jumlah"
                    placeholder="Jumlah (kg/pcs)" required>
            </div>
            <div class="col col-sm-2 text-center">
                <span class="subtotal-text">Rp0</span>
            </div>
            <div class="col-auto">
                <button type="button" class="btn-hapus-baris" title="Hapus baris">&times;</button>
            </div>
        </div>
    `;
    container.appendChild(div);

    const selectLayanan = div.querySelector('.select-layanan');
    const inputJumlah   = div.querySelector('.input-jumlah');
    const subtotalText  = div.querySelector('.subtotal-text');
    const satuanLabel   = div.querySelector('.sel-satuan-label');
    const btnHapus      = div.querySelector('.btn-hapus-baris');

    function hitungSubtotalBaris() {
        const selected = selectLayanan.options[selectLayanan.selectedIndex];
        const harga    = parseFloat(selected?.dataset?.harga  || 0);
        const satuan   = selected?.dataset?.satuan || '';
        const jumlah   = parseFloat(inputJumlah.value || 0);
        satuanLabel.textContent = satuan ? `Satuan: ${satuan}` : '';
        subtotalText.textContent = formatRupiah(harga * jumlah);
        hitungTotal();
    }

    selectLayanan.addEventListener('change', hitungSubtotalBaris);
    inputJumlah.addEventListener('input',  hitungSubtotalBaris);
    btnHapus.addEventListener('click', function () {
        div.remove();
        hitungTotal();
    });
}

function hitungTotal() {
    let total = 0;
    document.querySelectorAll('#daftar-layanan .row-layanan').forEach(row => {
        const select   = row.querySelector('.select-layanan');
        const input    = row.querySelector('.input-jumlah');
        const selected = select.options[select.selectedIndex];
        const harga    = parseFloat(selected?.dataset?.harga || 0);
        const jumlah   = parseFloat(input.value || 0);
        total += harga * jumlah;
    });
    document.getElementById('total-display').textContent = formatRupiah(total);
    hitungKembalian(total);
}

function hitungKembalian(total) {
    const dibayar  = parseFloat(document.getElementById('input-dibayar').value || 0);
    const kembalian = Math.max(0, dibayar - total);
    const el = document.getElementById('display-kembalian');
    if (el) el.textContent = formatRupiah(kembalian);
}

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('btn-tambah-layanan').addEventListener('click', tambahBarisLayanan);
    document.getElementById('input-dibayar').addEventListener('input', function () {
        const totalText = document.getElementById('total-display').textContent;
        const total = parseInt(totalText.replace(/[^\d]/g, '')) || 0;
        hitungKembalian(total);
    });
    tambahBarisLayanan();
});
