document.addEventListener("DOMContentLoaded", () => {
  // ========== Add User Modal ==========
  const userModal = document.getElementById("userModal");
  const openUserModalBtn = document.getElementById("openModalBtn");
  const closeUserModalBtn = document.getElementById("closeModal");

  if (openUserModalBtn && userModal && closeUserModalBtn) {
    openUserModalBtn.onclick = () => (userModal.style.display = "flex");
    closeUserModalBtn.onclick = () => (userModal.style.display = "none");
    window.addEventListener("click", (e) => {
      if (e.target === userModal) userModal.style.display = "none";
    });
  }

  // ========== Upload House Modal ==========
  const houseFormModal = document.getElementById("houseFormModal");
  const openHouseFormBtn = document.getElementById("openFormBtn");
  const closeHouseFormBtn = document.getElementById("closeFormBtn");

  if (openHouseFormBtn && houseFormModal && closeHouseFormBtn) {
    openHouseFormBtn.onclick = () => (houseFormModal.style.display = "flex");
    closeHouseFormBtn.onclick = () => (houseFormModal.style.display = "none");
    window.addEventListener("click", (e) => {
      if (e.target === houseFormModal) houseFormModal.style.display = "none";
    });
  }

  // ========== Search Filter ==========
  const searchInput = document.getElementById("searchInput");
  if (searchInput) {
    searchInput.addEventListener("keyup", function () {
      const search = this.value.toLowerCase();
      const rows = document.querySelectorAll("#userTable tbody tr");
      rows.forEach((row) => {
        const text = row.innerText.toLowerCase();
        row.style.display = text.includes(search) ? "" : "none";
      });
    });
  }

  // ========== House Table Filter ==========
  const filterInput = document.getElementById("filterInput");
  if (filterInput) {
    filterInput.addEventListener("keyup", function () {
      const filter = this.value.toLowerCase();
      const rows = document.querySelectorAll(
        "#uploadedTable tbody tr, #rentedTable tbody tr"
      );
      rows.forEach((row) => {
        const text = row.innerText.toLowerCase();
        row.style.display = text.includes(filter) ? "" : "none";
      });
    });
  }

  // ========== Form Submission ==========
  const houseForm = document.getElementById("houseForm");
  if (houseForm) {
    houseForm.addEventListener("submit", function (e) {
      e.preventDefault();
      alert("House uploaded successfully!");
      houseFormModal.style.display = "none";
    });
  }
});
