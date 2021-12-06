const navbuttom = document.querySelector('.navButton')
const contentMenu = document.querySelector('.content-menu')

navbuttom.addEventListener('click',() => {
    contentMenu.classList.toggle('hidden')
})
