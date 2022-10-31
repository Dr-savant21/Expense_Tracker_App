// alert('working');
const toggleBtn = document.querySelector(".sidebar-toggle");
const closeBtn = document.querySelector(".close-btn");
const sidebar = document.querySelector(".sidebar");
const sidebarOpt = document.querySelector('.sidebar-opt');

toggleBtn.addEventListener("click", function () {
  if (sidebarOpt.classList.contains("sidebar0")) {
    sidebarOpt.classList.remove("sidebar0");
  } else {
    sidebarOpt.classList.add("sidebar0");
  }
  sidebar.classList.toggle("show-sidebar");
//   sidebarOpt.classList.remove("hide-sideabar0");
});

closeBtn.addEventListener("click", function () {
  sidebar.classList.add("show-sidebar");
  if (sidebarOpt.classList.contains("sidebar0")) {
    sidebarOpt.classList.remove("sidebar0");
  } else {
    sidebarOpt.classList.add("sidebar0");
  }
});