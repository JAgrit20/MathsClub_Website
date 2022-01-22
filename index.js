const toggleButton = document.querySelector('#toggle')
const navbarLinks = document.querySelector('.nav-links')
const copied = document.querySelector('#copied');
toggleButton.addEventListener('click', () => {
  navbarLinks.classList.toggle('active')
})

function copyCode(code) {
  /* Get the text field */
  // var copyText = document.getElementById("myInput");

  /* Select the text field */
  // copyText.select();
  // copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(code);
  copied.classList.add('copied');
  copied.addEventListener('animationend',()=> {
    copied.classList.remove('copied');
  })
  /* Alert the copied text */
  // alert("Copied the text: " + code);
}
