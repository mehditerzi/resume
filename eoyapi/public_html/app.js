const express = require('express')
const app = express()
const port = 3002
const session = require("express-session")
const elastic = require("./myModules/elastic")

const ping = require('ping')
const fs = require("fs")
const { TwingEnvironment, TwingLoaderFilesystem } = require('twing');
let loader = new TwingLoaderFilesystem('./site');
let twing = new TwingEnvironment(loader);

const request = require('axios')

const db = require('./myModules/mongodb');

const mobilMi = require("./myModules/ismobile")

const md5 = require("./myModules/md5")

const mail = require("./myModules/mail")

const bodyParser = require('body-parser');

const sizeOf = require('object-sizeof');

app.use(express.json()) // for parsing application/json
app.use(express.urlencoded({ extended: true }));
app.use(bodyParser.urlencoded({ extended: true }));

app.use(session({
    secret: "secret-key",
    resave: false,
    saveUninitialized: true
}))

app.get("/", (req, res) => {
    db.find({}, "homeSlider").then(reply => {
        twing.render("index.php", {sliders: reply, anasayfa: true}).then(output => {
            res.send(output)
        })
    })
})

app.get("/hakkimizda", (req, res) => {
    db.find({}, "about").then(reply => {
        twing.render("about.php", {sliders: reply}).then(output => {
            res.send(output)
        })
    })
})
app.get("/projeler", (req, res) => {
    db.find({}, "projects").then(reply => {
        twing.render("projects.php", { datas: reply }).then(output => {
            res.send(output)
        })
    })
})
app.get("/proje_:id", (req, res) => {
    db.findId(req.params.id, "projects").then(reply => {
        twing.render("project-detail.php", { data: reply[0] }).then(output => {
            res.send(output)
        })
    })
})
app.get("/iletisim", (req, res) => {
    twing.render("contact.php", {}).then(output => {
        res.send(output)
    })
})

app.post("/send-mail", (req, res) => {
    mail.send("<info@eksiogluonuryapi.com>", req.body.email, req.body.name + "'den Bir Mailiniz Var!", "/parts/mailing/mailing2.html", {name: req.body.name, message: req.body.message, email: req.body.email }).then(() => {
        mail.send(req.body.email, "<info@eksiogluonuryapi.com>","Say??n " + req.body.name + " Mesaj??n??z?? Ald??k", "/parts/mailing/mailing.html", {name: req.body.name}).then(() => {
        })
        res.send("Mesaj??n??z bize ula??m????t??r, en yak??n s??rede size d??n???? yapaca????z.")
    }).catch(err => {
        res.send("Mesaj??n??z?? g??nderirken bir hata olu??tu, birka?? dakika sonra tekrar deneyiniz.")
    })

})



app.listen(port, () => console.log("Sistem Ba??lat??ld??"))