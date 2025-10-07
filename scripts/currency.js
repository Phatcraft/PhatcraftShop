var prices = document.getElementsByClassName("price")

for(let price of prices){
  price.innerHTML = (parseFloat(price.innerHTML)).toLocaleString('vi-VN', {
    style: 'currency',
    currency: 'vnd'
  })
}