const {Product} = require("./database/models")

Product.bulkCreate([
  {productID: "P001", name: "Nước khoáng", info: "Nước khoáng thiên nhiên", price: 10000},
  {productID: "P002", name: "Sữa tươi"   , info: "Sữa tươi có đường"      , price: 7000},
  {productID: "P003", name: "Chanh"      , info: "Quả chanh nhỏ"          , price: 5000},
  {productID: "P004", name: "Mì ăn liền" , info: "Gói mì ăn liền"         , price: 5000}
])
.then(() => console.log("PRODUCTS CREATED"))
.catch(err => console.log("CREATE FAILED"))