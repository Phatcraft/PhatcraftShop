const { sequelize } = require("./config");
const {DataTypes} = require("sequelize")

// Product model
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

// User model
const User = sequelize.define('User', {
  userID:{
    type: DataTypes.UUID,
    primaryKey: true,
    allowNull: false,
    defaultValue: DataTypes.UUIDV4
  },
  username:{
    type: DataTypes.STRING,
    unique: true,
    allowNull: false
  },
  email:{
    type: DataTypes.STRING,
    unique: true,
    allowNull: false
  },
  password: DataTypes.STRING,
  rule: {
    type: DataTypes.ENUM("ADMIN", "USER"),
    defaultValue: "USER"
  }
})

module.exports = {Product, User}