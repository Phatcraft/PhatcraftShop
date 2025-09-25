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
    limit: 3
  })
  res.render("home", {page: "home", products: products})
})


// RUN SERVER
server.listen(
  3000,
  () => console.log("  Server running: SUCCESS")
)