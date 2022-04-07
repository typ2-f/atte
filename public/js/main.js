const form_passcheck = document.getElementById("form-pass_check");
form_passcheck.addEventListener("change", alertPass, false);

function alertPass() {
    const password = document.getElementById("password").value;
    const passcheck = document.getElementById("passcheck").value;
    const err_msg = document.getElementById("err_msg");
    if (password != passcheck) {
        err_msg.innerHTML = "確認用パスワードが一致していません";
    }
}
