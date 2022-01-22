const toggleButton = document.querySelector('#toggle')
const navbarLinks = document.querySelector('.nav-links')
toggleButton.addEventListener('click', () => {
  navbarLinks.classList.toggle('active')
})