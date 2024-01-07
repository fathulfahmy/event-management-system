const password = document.getElementById("password");

function showPassword() {
  if (password.type === "password") {
    password.type = "text";
  } else {
    password.type = "password";
  }
}
