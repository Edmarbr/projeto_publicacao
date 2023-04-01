// Configurações do menu burger

let menu = document.querySelector("#imagem_menu")
let div_menu = document.querySelector(".img_login")
let nav = document.getElementById("nav")
let BtnLogout = document.getElementById("BtnLogout")
let divConfirmSaida = document.querySelector(".confirmSaida")
const btnsOpcs = [...document.querySelectorAll(".btnOpc")]
const form_logout = document.getElementById("form_logout")

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
    divConfirmSaida.style.display = 'flex'
    btnsOpcs.map((ele, indice) => {
        if (ele.click && indice == 0) {
            ele.addEventListener("click", () => {
                form_logout.submit()
            })
        }
        if (ele.click && indice == 1) {
            ele.addEventListener("click", () => {
                divConfirmSaida.style.display = 'none'
            })
        }
    })
})