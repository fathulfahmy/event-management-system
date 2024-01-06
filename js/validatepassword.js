const password = document.getElementById("password");
const retypePassword = document.getElementById("retypepassword");
const retypePasswordMsg = document.getElementById("retypepasswordmsg");

const validatePassword = () => {
  const lowerCaseLetters = /[a-z]/g;
  const upperCaseLetters = /[A-Z]/g;
  const numbers = /[0-9]/g;
  const minLength = 8;

  if (
    password.value.match(lowerCaseLetters) &&
    password.value.match(upperCaseLetters) &&
    password.value.match(numbers) &&
    password.value.length >= minLength
  ) {
    if (
      password.value !== "" &&
      retypePassword.value !== "" &&
      password.value !== retypePassword.value
    ) {
      retypePassword.setCustomValidity("Passwords do not match.");
      retypePasswordMsg.innerHTML = "Passwords do not match.";
    } else {
      retypePassword.setCustomValidity("");
    }
  } else {
    retypePassword.setCustomValidity(
      "Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters."
    );
    retypePasswordMsg.innerHTML =
      "Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters";
  }
};

password.addEventListener("input", validatePassword);
retypePassword.addEventListener("input", validatePassword);

function togglePassword() {
  if (password.type === "password" && retypePassword.type === "password") {
    password.type = "text";
    retypePassword.type = "text";
  } else {
    password.type = "password";
    retypePassword.type = "password";
  }
}

const showPassword = document.getElementById("showpassword");
showPassword.onclick = togglePassword;
