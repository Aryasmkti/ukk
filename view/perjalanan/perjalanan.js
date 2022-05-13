var table;
var id_user = $('#id_user').val();


//function yang berjalan diawal saat script ini diakses
function init() {
    showForm(false);
    get_data(id_user);

    $("#formTambah").on("submit", function (e) {
        saveOrEdit(e);
    });
}

//function digunakan untuk membersihkan semua inputan dari form
function cleanString() {
    $("#id_perjalanan").val("");
    $("#waktu").val("");
    $("#lokasi").val("");
    $("#suhu").val("");
}

//function yang digunakan untuk menampilkan form perjalanan
function showForm(flag) {
    cleanString();
    if (flag) {
        $("#daftarPerjalanan").hide();
        $("#formTambah").show();
        $("#btnTambah").hide();
    } else {
        $("#daftarPerjalanan").show();
        $("#formTambah").hide();
        $("#btnTambah").show();
    }
}

//function yang digunakan untuk membatalkan menampilkan showForm
function closeForm() {
    cleanString();
    showForm(false);
}

//function yang digunakan menampilkan seluruh data pada dataTable
function get_data(id_user) {
    // console.log(id_user);
    table = $('#tbl_list').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "ajax": {
            url: '../../controller/perjalanan.php?action=get_data',
            type: "POST",
            dataType: "JSON",
            data: { id_user: id_user },
            error: function (e) {
                console.log(e.responseText);
            }
        },
        responsive: true
    }).DataTable();
}

function saveOrEdit(e) {
    e.preventDefault();
    var formData = new FormData($("#formTambah")[0]);

    if ($('#waktu').val() == '' || $('#lokasi').val() == '') {
        swal("Perhatian", "Silahkan Isi Data Terlebih Dahulu", "warning");
    } else {
        $.ajax({
            url: "../../controller/perjalanan.php?action=saveOrEdit",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,

            success: function (data) {
                swal("Selamat", "Data Berhasil Disimpan", "success");
                showForm(false);
                table.ajax.reload();
            }

        });
    }
    cleanString();
}

function show(id_perjalanan) {
    $.post("../../controller/perjalanan.php?action=show", { id_perjalanan: id_perjalanan }, function (data) {
        data = JSON.parse(data);
        showForm(true);

        $("#waktu").val(data.waktu);
        $("#lokasi").val(data.lokasi);
        $("#suhu").val(data.suhu);
        $("#id_perjalanan").val(data.id_perjalanan);
    })
}

function delete_data(id_perjalanan) {

    swal({
        title: "Konfirmasi Penghapusan Data",
        text: "Data Akan Dihapus Permanen!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.post("../../controller/perjalanan.php?action=delete_data", { id_perjalanan: id_perjalanan }, function (data) { })

                table.ajax.reload();

                swal("Data Telah Dihapus", {
                    icon: "success",
                });
            } else {
                swal("Penghapusan Dibatalkan");
            }
        });
}

init()