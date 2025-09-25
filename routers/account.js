const express = require('express')
const AccountRouter = express.Router()

AccountRouter.get('/', (req, res) => {
  if(!req.session.user) res.redirect("/account/login")
  else res.send(req.session.user)
})

AccountRouter.get("/login", (req, res) => {
  res.render("login", {page: "account"})
})

AccountRouter.get("/signup", (req, res) => {
  res.render("signup", {page: "account"})
})

module.exports = AccountRouter