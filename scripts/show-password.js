// Show & hode password
var password_checkbox = document.getElementById("password")
password_checkbox.addEventListener("click", () => {
  var password_input = document.getElementById("password-input")
  if(password_checkbox.checked) password_input.type = "text"
  else password_input.type = "password"
})

// Show & hode confirm password
var confirm_checkbox = document.getElementById("confirm-password")
confirm_checkbox.addEventListener("click", () => {
  var confirm_input = document.getElementById("confirm-password-input")
  if(confirm_checkbox.checked) confirm_input.type = "text"
  else confirm_input.type = "password"
})