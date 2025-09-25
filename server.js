const express = require('express')
const expressEjsLayouts = require('express-ejs-layouts')
const {startingAndSync} = require("./database/config")
const HomeRouter = require("./routers/home")
const AccountRouter = require("./routers/account")
const session = require('express-session')

// EXPRESS SERVER & EJS
var server = express()
server.set("view engine", "ejs")
server.set("views", "./views")
server.use(expressEjsLayouts)

// SESSION
server.use(session({
  secret: "HelloWorldThisIsPhatcraftShopSecret",
  resave: false,
  saveUninitialized: false
}))

// DATABASE
startingAndSync()

// ROUTERS
server.use("/", HomeRouter)
server.use("/account", AccountRouter)

// RUN SERVER
server.listen(
  3000,
  "0.0.0.0",
  () => console.log("  Server running: SUCCESS")
)