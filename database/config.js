const { Sequelize } = require("sequelize");

const sequelize = new Sequelize({
  dialect: 'mysql',
  host: 'localhost',
  port: 3306,
  username: 'root',
  password: '',
  database: 'phatcraftshop',
  logging: false
})

function startingAndSync(){
  // Starting
  sequelize.authenticate()
  .then(() => console.log("Connect database: SUCCESS"))
  .catch(err => console.log("Connect database: FAILED"))

  require("./models")

  // Syncing
  sequelize.sync()
  .then(() => console.log("     Sync models: SUCCESS"))
  .catch(err => console.log("     Sync models: FAILED"))
}

module.exports = {sequelize, startingAndSync}