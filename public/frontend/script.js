  // -----------------------------
  // Navbar
// -----------------------------

const menuBtn = document.querySelector(".menu-icon span");
const searchBtn = document.querySelector(".search-icon");
const cancelBtn = document.querySelector(".cancel-icon");
const items = document.querySelector(".nav-items");
const form = document.querySelector("form");
menuBtn.onclick = ()=>{
  items.classList.add("active");
  menuBtn.classList.add("hide");
  searchBtn.classList.add("hide");
  cancelBtn.classList.add("show");
}
cancelBtn.onclick = ()=>{
  items.classList.remove("active");
  menuBtn.classList.remove("hide");
  searchBtn.classList.remove("hide");
  cancelBtn.classList.remove("show");
  form.classList.remove("active");
  cancelBtn.style.color = "#ff3d00";
}
searchBtn.onclick = ()=>{
  form.classList.add("active");
  searchBtn.classList.add("hide");
  cancelBtn.classList.add("show");
}


  // -----------------------------
  // home filter button
// -----------------------------
document.addEventListener("DOMContentLoaded", function() {
    const filterToggle = document.querySelector(".filter-toggle");
    const dropdown = document.querySelector(".dropdown");

    // Show/hide dropdown on filter toggle click
    filterToggle.addEventListener("click", function() {
      dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
    });

    // Hide dropdown when clicking outside of it
    document.addEventListener("click", function(event) {
      const targetElement = event.target;
      if (!dropdown.contains(targetElement) && targetElement !== filterToggle) {
        dropdown.style.display = "none";
      }
    });
  });


   // -----------------------------
  // fitlered Hostel cards
// -----------------------------

  document.addEventListener("DOMContentLoaded", function() {
    const locationList = document.getElementById("location-list");
    const locationCards = document.getElementById("location-cards");
    const cards = locationCards.getElementsByClassName("card");

    // Filter locations
    locationList.addEventListener("click", function(event) {
      if (event.target.nodeName === "LI") {
        const filter = event.target.getAttribute("data-filter");

        // Remove active class from all list items
        Array.from(locationList.getElementsByTagName("li")).forEach(function(item) {
          item.classList.remove("active");
        });

        // Add active class to the clicked list item
        event.target.classList.add("active");

        // Show all cards when "All" is selected
        if (filter === "all") {
          Array.from(cards).forEach(function(card) {
            card.style.display = "block";
          });
        } else {
          Array.from(cards).forEach(function(card) {
            const cardFilter = card.getAttribute("data-filter");
            card.style.display = cardFilter === filter ? "block" : "none";
          });
        }
      }
    });
  });





// <-------------------
//  Gallery Script\
//  ------------------>

// Get the filter buttons
const filterButtons = document.querySelectorAll('.filter-button');

// Add click event listener to each filter button
filterButtons.forEach(button => {
  button.addEventListener('click', function() {
    // Remove 'active' class from all buttons
    filterButtons.forEach(btn => btn.classList.remove('active'));

    // Add 'active' class to the clicked button
    this.classList.add('active');

    // Get the filter value from the data-filter attribute
    const filterValue = this.getAttribute('data-filter');

    // Get all grid items
    const gridItems = document.querySelectorAll('.grid-item');

    // Iterate through each grid item
    gridItems.forEach(item => {
      // Get the data-category value of each grid item
      const itemCategory = item.getAttribute('data-category');

      // Check if the grid item's category matches the selected filter or if the filter is set to 'all'
      if (filterValue === 'all' || filterValue === itemCategory) {
        // Show the grid item
        item.style.display = 'block';
      } else {
        // Hide the grid item
        item.style.display = 'none';
      }
    });
  });
});


/*
<!-- <-----------------------
Contact Page SCript
------------------------->  */

// JavaScript code for handling form submission (can be expanded as needed)
document.getElementById('contact-form').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent form from submitting

  // Add your logic here for processing the form data, e.g., sending an email

  alert('Thank you for your message! We will get back to you soon.');
  this.reset(); // Reset the form
});





