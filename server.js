const express = require('express')
const expressEjsLayouts = require('express-ejs-layouts')
const {startingAndSync} = require("./database/config")

// EXPRESS SERVER & EJS
var server = express()
server.set("view engine", "ejs")
server.set("views", "./views")
server.use(expressEjsLayouts)

products = [
  {productName: "Water bottle", productInfo: "Just a water bottle", productPrice: 10000},
  {productName: "Milk", productInfo: "Milk bottle", productPrice: 7000},
  {productName: "Lemon", productInfo: "A small lemon", productPrice: 5000},
  {productName: "Noodle", productInfo: "Instant noodle", productPrice: 5000}
]

// DATABASE
startingAndSync()

// ROUTES
server.get("/", (req, res) => {
  res.render("home", {page: "home", products: products})
})


// RUN SERVER
server.listen(
  3000,
  () => console.log("Server: RUNNING")
)