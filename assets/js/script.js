function previewImage() {
  var input = document.getElementById("inputFoto");
  var preview = document.getElementById("tampilFoto");
  var container = document.getElementById("previewContainer");

  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      preview.src = e.target.result;
      container.classList.remove("hidden"); // Hapus class hidden tailwind
    };
    reader.readAsDataURL(input.files[0]);
  }
}

function searchTable() {
  // 1. Ambil input user dan ubah ke huruf kecil semua (biar tidak case sensitive)
  var input = document.getElementById("searchInput");
  var filter = input.value.toLowerCase();

  // 2. Ambil tabel dan semua barisnya
  var table = document.getElementById("dataTable");
  var tr = table.getElementsByTagName("tr");

  // 3. Looping semua baris (mulai dari 1 karena 0 adalah Header)
  for (var i = 1; i < tr.length; i++) {
    // Kita cek Kolom "Nama Barang" (index 2) dan "Lokasi" (index 3)
    var tdNama = tr[i].getElementsByTagName("td")[2];
    var tdLokasi = tr[i].getElementsByTagName("td")[3];

    if (tdNama || tdLokasi) {
      var txtNama = tdNama.textContent || tdNama.innerText;
      var txtLokasi = tdLokasi.textContent || tdLokasi.innerText;

      // Jika salah satu kolom mengandung kata kunci, tampilkan barisnya
      if (
        txtNama.toLowerCase().indexOf(filter) > -1 ||
        txtLokasi.toLowerCase().indexOf(filter) > -1
      ) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("imageModal");
    const modalImg = document.getElementById("modalImage");
    const btnClose = document.getElementById("btnCloseModal");

    // Ambil semua gambar yang bisa di-preview
    const previewImages = document.querySelectorAll(".preview");

    // Saat gambar diklik
    previewImages.forEach(img => {
        img.addEventListener("click", () => {
            modalImg.src = img.getAttribute("data-src");
            modal.classList.remove("hidden");
        });
    });

    // Tombol X
    btnClose.addEventListener("click", () => {
        modal.classList.add("hidden");
        modalImg.src = "";
    });

    // Klik area gelap (bukan gambar)
    modal.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.classList.add("hidden");
            modalImg.src = "";
        }
    });

    // Tombol ESC
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            modal.classList.add("hidden");
            modalImg.src = "";
        }
    });
});