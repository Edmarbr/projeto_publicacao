const inputEmail = document.getElementById("iemail")
const senha = document.getElementById("isenha")
const confirmSenha = document.getElementById("iconfirm_senha")
const formulario = document.getElementById("FormCadastro")
const Bntsubmit = document.getElementById("btnSubmit")
const nome = document.getElementById("inome")

const Validacao = (emailFunc, senhaFunc, confirmSenhaFunc, nomeFunc) => {
    const emailValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/    // verifica se o endereço de e-mail contém pelo menos um caractere antes e depois do símbolo "@" e pelo menos um caractere depois do último ponto "."
    const nomeValido = /^[^\s]/     // verifica se o nome não está vazio e não inicia com espaço

    if (emailValido.test(emailFunc) && senhaFunc.length >= 8 && confirmSenhaFunc.length >= 8 && senhaFunc == confirmSenhaFunc && nomeValido.test(nomeFunc)) {
        Bntsubmit.type = 'submit'
    } else {
        alert("Algum campo está inválido ou vazio! Verifique e tente novamente!")
    }
}

Bntsubmit.addEventListener("click", () => {
    Validacao(inputEmail.value, senha.value, confirmSenha.value, nome.value)
    if (Bntsubmit.type == 'submit')
        formulario.submit()
})

