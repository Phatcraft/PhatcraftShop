const dates = document.getElementsByClassName("date")

for(let date of dates){
  const dateFormat = date.innerHTML.replace(" ", "T")
  const newDate = new Date(dateFormat)

  date.innerHTML = "Bắt đầu vào " + newDate.toLocaleString('vi-VN', {
    weekday: 'long',
    year: 'numeric',
    month: 'long',
    day: 'numeric',
    hour: 'numeric',
    minute: 'numeric',
    second: 'numeric'
  })
}