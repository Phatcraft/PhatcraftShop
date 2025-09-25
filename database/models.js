const { sequelize } = require("./config");
const {DataTypes} = require("sequelize")

const Product = sequelize.define('Product', {
  productID: {
    type: DataTypes.STRING,
    primaryKey: true,
    allowNull: false
  },
  name: DataTypes.STRING,
  info: DataTypes.STRING,
  price: DataTypes.FLOAT
}, {
  tableName: 'products',
  timestamps: false
})

module.exports = {Product}