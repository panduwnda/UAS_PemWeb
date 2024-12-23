function openUpdateModal(id, nama, email) {
  document.getElementById("update-id").value = id;
  document.getElementById("update-nama").value = nama;
  document.getElementById("update-email").value = email;
  document.getElementById("update-modal").style.display = "flex";
}

function closeModal() {
  document.getElementById("update-modal").style.display = "none";
}
