const express = require('express')
const {sequelize} = require("../database/config")
const { Product } = require('../database/models')
const HomeRouter = express.Router()


HomeRouter.get("/", async (req, res) => {
  const products = await Product.findAll({
    order: sequelize.literal("RAND()"),
    limit: 4
  })
  res.render("home", {page: "home", products: products})
})

module.exports = HomeRouter