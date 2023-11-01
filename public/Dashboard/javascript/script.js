let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}



document.addEventListener("DOMContentLoaded", function () {
    const manageBlogsLink = document.getElementById("manageBlogsLink");
    const manageBlogsSubLinks = document.getElementById("manageBlogsSubLinks");
    const arrowIcon = document.getElementById("arrowIcon");

    manageBlogsLink.addEventListener("click", function () {
        manageBlogsSubLinks.classList.toggle("active");
        arrowIcon.classList.toggle("active");
    });
});






    document.addEventListener("DOMContentLoaded", function () {
        const dropdowns = document.querySelectorAll(".dropdown");

        dropdowns.forEach(dropdown => {
            const dropdownToggle = dropdown.querySelector(".dropdown-toggle");
            const dropdownMenu = dropdown.querySelector(".dropdown-menu");

            dropdownToggle.addEventListener("click", function (event) {
                event.preventDefault();
                dropdownMenu.classList.toggle("show");
            });

            // Close the dropdown when clicking outside
            document.addEventListener("click", function (event) {
                if (!dropdown.contains(event.target)) {
                    dropdownMenu.classList.remove("show");
                }
            });
        });
    });

