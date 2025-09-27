const express = require('express')
const ApiRouter = express.Router()
const {User} = require("../database/models")
const bcrypt = require("bcrypt")


// Login API
ApiRouter.post("/login", (req, res) => {
  const {username, password} = req.body

  // Get user
  User.findOne({
    where: {username: username}
  })
  .then(async (result) => {
    if(await bcrypt.compare(password, result.password)){
      req.session.user = {userID: result.userID, username: username}
      res.json({success: true, message: `Chào mừng quay trở lại, ${username}`})
    }else
      res.json({success: false, message: "Mật khẩu không chính xác. Vui lòng thử lại"})
  })
  .catch(err => res.json({success: false, message: "Người dùng không tồn tại. Vui lòng thử lại"}))
})

// Signup API
ApiRouter.post("/signup", async (req, res) => {
  const {username, email, password} = req.body

  const hash = await bcrypt.hash(password, bcrypt.genSaltSync(10))
  User.create({
    username: username,
    email: email,
    password: hash
  })
  .then((result) => {
    req.session.user = {userID: result.userID, username: username}
    res.json({success: true, message: `Chào mừng đến với Phatcraft Shop, ${username}`})
  })
  .catch(err => res.json({success: false, message: "Tên người dùng hoặc emal đã sử dụng. Vui lòng thử lại"}))
})

module.exports = ApiRouter