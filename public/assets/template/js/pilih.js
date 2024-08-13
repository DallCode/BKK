document.getElementById('search-button').addEventListener('click', function() {
    var jurusanSelect = document.getElementById('jurusan-select').value;
    var tahunSelect = document.getElementById('tahun-select').value;

    var rows = document.querySelectorAll('#alumni-table tr');

    rows.forEach(function(row) {
        var jurusan = row.getAttribute('jurusan');
        var tahun_lulus = row.getAttribute('tahun_lulus');
        
        if ((jurusanSelect === '' || jurusan === jurusanSelect) && (tahunSelect === '' || tahun_lulus === tahunSelect)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});