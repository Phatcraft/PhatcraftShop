const express = require('express')
const expressEjsLayouts = require('express-ejs-layouts')
const {startingAndSync, sequelize} = require("./database/config")
const { Product } = require('./database/models')

// EXPRESS SERVER & EJS
var server = express()
server.set("view engine", "ejs")
server.set("views", "./views")
server.use(expressEjsLayouts)

// DATABASE
startingAndSync()

// ROUTES
server.get("/", async (req, res) => {
  const products = await Product.findAll({
    order: sequelize.literal("RAND()"),
    limit: 4
  })
  res.render("home", {page: "home", products: products})
})

server.get("/login", (req, res) => {
  res.render("login", {page: "account"})
})

server.get("/signup", (req, res) => {
  res.render("signup", {page: "account"})
})

// RUN SERVER
server.listen(
  3000,
  "0.0.0.0",
  () => console.log("  Server running: SUCCESS")
)