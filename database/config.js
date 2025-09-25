const { Sequelize } = require("sequelize");

const sequelize = new Sequelize({
  dialect: 'mysql',
  host: 'localhost',
  port: 3306,
  username: 'root',
  password: '',
  database: 'phatcraftshop'
})

function startingAndSync(){
  // Starting
  sequelize.authenticate()
  .then(() => console.log("Database: CONNECTED"))
  .catch(err => console.log("Database: FAILED"))

  // Syncing
  sequelize.sync()
  .then(() => console.log("Sync models: SUCCESS"))
  .catch(err => console.log("Sync models: FAILED"))
}

module.exports = {sequelize, startingAndSync}