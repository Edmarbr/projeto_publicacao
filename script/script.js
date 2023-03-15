let menu = document.querySelector("#imagem_menu")
let div_menu = document.querySelector(".img_login")
let nav = document.getElementById("nav")

menu.addEventListener("click", () => {
    if (nav.style.display == 'block') {
        nav.style.display = 'none'
    } else {
        nav.style.display = 'block'
    }
})

function tamanho() {
    if (window.innerWidth <= 550) {
        div_menu.style.display = 'block'
        nav.style.display = 'none'
    } else {
        nav.style.display = 'block'
        div_menu.style.display = 'none'
    }
}