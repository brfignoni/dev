const userIdSelect = document.getElementById("users-id-select");
userIdSelect.addEventListener("change", function (e) {
  //this.selectedIndex
  const selectedOption = this.querySelector("option:checked");
  const id = selectedOption.getAttribute("data-id");
  const username = selectedOption.getAttribute("data-username");
  const password = selectedOption.getAttribute("data-password");
  const submitButton = document.querySelector("#user-form #submit");
  const usernameInput = document.querySelector("#user-form #username");
  const passwordInput = document.querySelector("#user-form #password");
  const idInput = document.querySelector("#user-form #id");
  if (id) {
    submitButton.removeAttribute("disabled");
    idInput.value = id;
    if (username) {
      usernameInput.value = username;
    }
    if (password) {
      passwordInput.value = password;
    }
  } else if (submitButton) {
    //no user selected. disable button
    submitButton.setAttribute("disabled", "");
    usernameInput.value = "";
    passwordInput.value = "";
    idInput.value = "";
  }
});
