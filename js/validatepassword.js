const password = document.getElementById("password");
const retypePassword = document.getElementById("retypepassword");
const retypePasswordMsg = document.getElementById("retypepasswordmsg");

const validatePassword = () => {
  if (
    password.value !== "" &&
    retypePassword !== "" &&
    password.value !== retypePassword.value
  ) {
    retypePassword.setCustomValidity("Passwords do not match.");
    retypePasswordMsg.innerHTML = "Passwords do not match.";
  } else {
    retypePassword.setCustomValidity("");
  }
};

password.addEventListener("input", validatePassword);
retypePassword.addEventListener("input", validatePassword);
