var logout = document.getElementById("logout")
var update_email = document.getElementById("email")

logout.addEventListener("click", () => {
  var accept = confirm("Bạn chắc chắn muốn đăng xuất?")
  if(accept){
    location.replace("../APIs/logout.php")
  }
})

update_email.addEventListener("click", () => {
  var email = prompt("Nhập email mới")
  if(email == null) return
  
  if(email == ""){
    alert("Vui lòng nhập email chính xác")
    return
  }

  location.replace(`../APIs/update_mail.php?email=${email}`)
})