/**
 * NOAA Website Clone - JavaScript
 */

// Toggle Government Info Banner
function toggleGovInfo() {
  const govInfo = document.getElementById("govInfo")
  const toggleBtn = document.querySelector(".gov-banner-toggle")

  govInfo.classList.toggle("show")
  toggleBtn.classList.toggle("active")
}

// Toggle Mobile Menu
function toggleMobileMenu() {
  const mobileMenu = document.getElementById("mobileMenu")
  mobileMenu.classList.toggle("show")
}

// Close mobile menu when clicking outside
document.addEventListener("click", (event) => {
  const mobileMenu = document.getElementById("mobileMenu")
  const mobileMenuBtn = document.querySelector(".mobile-menu-btn")

  if (mobileMenu && !mobileMenu.contains(event.target) && !mobileMenuBtn.contains(event.target)) {
    mobileMenu.classList.remove("show")
  }
})

// Weather Search Functionality (placeholder)
document.addEventListener("DOMContentLoaded", () => {
  const weatherInputs = document.querySelectorAll(".weather-input, .mobile-weather-input")

  weatherInputs.forEach((input) => {
    input.addEventListener("keypress", function (e) {
      if (e.key === "Enter") {
        const location = this.value.trim()
        if (location) {
          // In Laravel, this would redirect to a weather route
          // window.location.href = `/weather?location=${encodeURIComponent(location)}`;
          alert(`Tìm kiếm thời tiết cho: ${location}`)
        }
      }
    })
  })

  // Search Button Click
  const searchBtns = document.querySelectorAll(".search-btn")
  searchBtns.forEach((btn) => {
    btn.addEventListener("click", function () {
      const input = this.previousElementSibling
      const location = input.value.trim()
      if (location) {
        alert(`Tìm kiếm thời tiết cho: ${location}`)
      }
    })
  })

  // Header Search
  const headerSearchBtn = document.querySelector(".header-search-btn")
  if (headerSearchBtn) {
    headerSearchBtn.addEventListener("click", () => {
      const input = document.querySelector(".header-search-input")
      const query = input.value.trim()
      if (query) {
        // In Laravel: window.location.href = `/search?q=${encodeURIComponent(query)}`;
        alert(`Tìm kiếm: ${query}`)
      }
    })
  }
})

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault()
    const target = document.querySelector(this.getAttribute("href"))
    if (target) {
      target.scrollIntoView({
        behavior: "smooth",
      })
    }
  })
})
