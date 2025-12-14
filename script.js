document.addEventListener('DOMContentLoaded', function() {
    loadData();
    
    document.getElementById('formTambah').addEventListener('submit', function(e) {
        e.preventDefault();
        tambahData();
    });
});

function loadData() {
    fetch('tambah.php?action=read')
        .then(response => response.json())
        .then(data => {
            tampilkanData(data);
        })
        .catch(error => console.error('Error:', error));
}

function tampilkanData(data) {
    const tbody = document.getElementById('dataMahasiswa');
    tbody.innerHTML = '';
    
    data.forEach(row => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${row.nim}</td>
            <td>${row.nama}</td>
            <td>${row.jurusan}</td>
            <td>
                <button class="btn btn-edit" onclick="editData(${row.id})">Edit</button>
                <button class="btn btn-delete" onclick="hapusData(${row.id})">Hapus</button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

function tambahData() {
    const nim = document.getElementById('nim').value;
    const nama = document.getElementById('nama').value;
    const jurusan = document.getElementById('jurusan').value;
    
    fetch('tambah.php?action=create', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `nim=${nim}&nama=${nama}&jurusan=${jurusan}`
    })
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            document.getElementById('formTambah').reset();
            loadData();
            alert('Data berhasil ditambahkan!');
        }
    });
}

function editData(id) {
    const nim = prompt('NIM baru:');
    const nama = prompt('Nama baru:');
    const jurusan = prompt('Jurusan baru:');
    
    if (nim && nama && jurusan) {
        fetch(`tambah.php?action=update&id=${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `nim=${nim}&nama=${nama}&jurusan=${jurusan}`
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                loadData();
                alert('Data berhasil diupdate!');
            }
        });
    }
}

function hapusData(id) {
    if (confirm('Yakin hapus data ini?')) {
        fetch(`tambah.php?action=delete&id=${id}`, {
            method: 'POST'
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                loadData();
                alert('Data berhasil dihapus!');
            }
        });
    }
}
