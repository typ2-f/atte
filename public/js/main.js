const form_passcheck = document.getElementById("form-pass_check");
form_passcheck.addEventListener("keyup", alertPass, false);

function alertPass() {
    const password = document.getElementById("password").value;
    const passcheck = document.getElementById("passcheck").value;
    const err_msg = document.getElementById("err_byJS");
    const btn_post = document.getElementById("btn-post");
    if (password != passcheck) {
        err_msg.innerHTML = "確認用パスワードが一致していません";
        btn_post.setAttribute('disabled','true');
    } else {
        err_msg.innerHTML = "";
        btn_post.removeAttribute('disabled');
    }
}
