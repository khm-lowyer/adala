const express = require("express");
const app = express();
const port = process.env.PORT || 3001;
const fs = require("fs");
const nodemailer = require("nodemailer");
const path = require("path");
const cookieParser = require("cookie-parser");


app.use(express.static("./assets"))
app.use(express.json());
app.use(cookieParser());
app.use(express.urlencoded({extended: false}));

app.get("/",(req, res)=>{
    res.sendFile(path.join(__dirname,"./assets/index.html"));
    // res.send("heey");
});
app.post("/form",(req, res)=>{
    const data = req.body;
    console.log(data);
    let testAccount = nodemailer.createTestAccount();

  // create reusable transporter object using the default SMTP transport
  let transporter = nodemailer.createTransport({
    host: "mail.khm-lawyers.com",
    port: 587,
    secure: false, // true for 465, false for other ports
    auth: {
      user: "contacts@khm-lawyers.com", // generated ethereal user
      pass: "khm123456", // generated ethereal password
    },
  });

  // send mail with defined transport object
  let info = transporter.sendMail({
    from: '"تاكيد تسجيل 👻" <contacts@khm-lawyers.com>', // sender address
    to: data.email, // list of receivers
    subject: "Hello ✔", // Subject line
    text: "Hello world?", // plain text body
    html: "<b>Hello world?</b>", // html body
  });

  console.log("Message sent: %s", info.messageId);
  // Message sent: <b658f8ca-6296-ccf4-8306-87d57a0b4321@example.com>

  // Preview only available when sending through an Ethereal account
  console.log("Preview URL: %s", nodemailer.getTestMessageUrl(info));
});

app.listen(port,()=>{console.log(`server on http://localhost:${port}`)})