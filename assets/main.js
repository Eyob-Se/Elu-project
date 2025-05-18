// Modal open/close logic
const modal = document.getElementById("userModal");
const openBtn = document.getElementById("openModalBtn");
const closeBtn = document.getElementById("closeModal");

openBtn.onclick = () => (modal.style.display = "flex");
closeBtn.onclick = () => (modal.style.display = "none");
window.onclick = (e) => {
  if (e.target == modal) modal.style.display = "none";
};

// Search filter logic
document.getElementById("searchInput").addEventListener("keyup", function () {
  const search = this.value.toLowerCase();
  const rows = document.querySelectorAll("#userTable tbody tr");
  rows.forEach((row) => {
    const text = row.innerText.toLowerCase();
    row.style.display = text.includes(search) ? "" : "none";
  });
});
