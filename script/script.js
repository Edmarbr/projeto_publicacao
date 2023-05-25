// Configurações do menu burger

const menu = document.querySelector("#imagem_menu")
const div_menu = document.querySelector(".img_login")
const nav = document.getElementById("nav")
const BtnLogout = document.getElementById("BtnLogout")
const form_logout = document.getElementById("form_logout")
let iconsRemove = [...document.querySelectorAll(".imgRemove")]

try {
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
} catch {

}

// Configurações de logout

BtnLogout.addEventListener("click", () => {
    if (confirm("Tem certeza que deseja sair?")) {
        form_logout.submit()
    }
})

// Configurações para remover a publicação

iconsRemove.map((ele) => {
    ele.addEventListener("click", (evt) => {
        if (!confirm("Tem certeza que deseja excluir?")) {
            evt.preventDefault()
        }
    })
})

