const headElem = document.getElementById("head");
const buttonsElem = document.getElementById("buttons");
const pagesElem = document.getElementById("pages");

class Quiz {
    constructor(type, questions, results) {
        this.type = type;
        this.questions = questions;
        this.results = results;
        this.score = 0;
        this.result = 0;
        this.current = 0;
    }

    Click(index) {
        let value = this.questions[this.current].Click(index);
        this.score += value;

        let correct = -1;

        if (value >= 1) {
            correct = index;
        } else {
            for (let i = 0; i < this.questions[this.current].answers.length; i++) {
                if (this.questions[this.current].answers[i].value >= 1) {
                    correct = i;
                    break;
                }
            }
        }

        this.Next();

        return correct;
    }

    Next() {
        this.current++;

        if (this.current >= this.questions.length) {
            this.End();
        }
    }

    End() {
        for (let i = 0; i < this.results.length; i++) {
            if (this.results[i].Check(this.score)) {
                this.result = i;
            }
        }
    }
}

class Question {
    constructor(text, answers) {
        this.text = text;
        this.answers = answers;
    }

    Click(index) {
        return this.answers[index].value;
    }
}

class Answer {
    constructor(text, value) {
        this.text = text;
        this.value = value;
    }
}

class Result {
    constructor(text, value) {
        this.text = text;
        this.value = value;
    }

    Check(value) {
        if (this.value <= value) {
            return true;
        } else {
            return false;
        }
    }
}

const results =
    [
        new Result("Вам стоит уже скачать Доту!", 0),
        new Result("Вы знаете лишь малую часть от этих механик!", 3),
        new Result("Вам стоит набраться опыта в игре!", 6),
        new Result("Вы неплохо разбираетесь в механиках, но есть куда стремиться!", 9),
        new Result("Ваш уровень знаний поистине хорош!", 12),
        new Result("Вы гений или очень удачливый!", 15)
    ];

const questions =
    [
        new Question("Кто из героев сможет вылететь из Sprout " +
            "героя Nature's Prophet с талантом на Leash: Winter Wyvern или Clockwerk с Aghanim's shard?",
            [
                new Answer("Clockwerk", 0),
                new Answer("Winter Wyvern", 1),
            ]),

        new Question("Что будет, если Tiny подкинет вверх героя с помощью" +
            " Toss на героя под действием Cold Feet?",
            [
                new Answer("Cold feet продолжит действовать на героя", 0),
                new Answer("Герой сразу замерзнет", 0),
                new Answer("Действие Cold Feet прервется", 1),
            ]),

        new Question("Продолжит ли летать Night Stalker, если Phoenix нажмет Supernova после " +
            "ульты Night Stalker?",
            [
                new Answer("На время действия Supernova герой перестанет летать, а после вновь взлетит", 0),
                new Answer("Герой продолжит летать вне зависимости от Supernova", 1),
                new Answer("Герой перестанет летать после начала действия Supernova", 0),
            ]),

        new Question("Сработает ли развеивание Aeon Disk, если на героя использовать Nullifier до " +
            "срабатывания Aeon Disk?",
            [
                new Answer("Вообще не сработает ", 0),
                new Answer("Предмет будет работать как обычно", 0),
                new Answer("Сработает только развеивание, неуязвимость от предмета не сработает", 1),
            ]),

        new Question("Morphling превратился в Spirit Breaker и оба героя нажали разгон друг на друга " +
            "кто кого оглушит?",
            [
                new Answer("Зависит от того, кто последний нажал разгон", 1),
                new Answer("Оглушит тот, у кого выше скорость", 0),
                new Answer("Оба героя получат оглушение", 0),
                new Answer("Никто не оглушится", 0)
            ]),

        new Question("Gyrocopter купил себе Aghanim's Scepter, его ударили из невидимости предмета " +
            "Silver Edge. Что произойдет со с способностью Flak Cannon?",
            [
                new Answer("Ничего не произойдет", 0),
                new Answer("Flak Cannon не будет работать даже при активации на время истощения", 0),
                new Answer("Пассивные выстрелы Flak Cannon превратятся на время истощения", 1),
            ]),

        new Question("Что будет, если на героя использовать Orchid Malevolence, " +
            "нанести 450 урона, а после излечить 400хп?",
            [
                new Answer("Урон от Orchid не нанесется", 0),
                new Answer("Нанесется 30% от 50 урона", 0),
                new Answer("Нанесется 30% от 450 урона", 1),
            ]),

        new Question("Каким крипом является курьер : нейтральным, маленьким, средним, древним?",
            [
                new Answer("Нейтральным", 0),
                new Answer("Маленьким", 0),
                new Answer("Средним", 0),
                new Answer("Древним", 1)
            ]),

        new Question("Можно ли с помощью Aghanim's Shard Rubick'a вытянуть союзника из Chronosphere" +
            " героя Faceless Void",
            [
                new Answer("Да", 0),
                new Answer("Нет", 1),
            ]),

        new Question("Что произойдет, если Shadow Shaman свяжет героя Shackles " +
            "и в этого героя попадет Meat Hook Pudge?",
            [
                new Answer("Герой продолжит использовать способность вне зависимости от длины траектории хука", 1),
                new Answer("Способность прервется, если будет превышен радиус действия способности", 0),
                new Answer("Способность прервется в любом случае", 0),
            ]),

        new Question("Излечится ли Death Prophet после окончания действия Exorcism, " +
            "если героя поместить в астрал во время возвращения духов",
            [
                new Answer("Не излечится", 0),
                new Answer("Излечится на четверть от нанесенного урона", 0),
                new Answer("Излечится на половину от нанесенного урона", 0),
                new Answer("Излечится на 100% от нанесенного урона", 1)
            ]),

        new Question("Какой из способностей можно оглушить Storm Spirit во время полета " +
            "в Ball Lightning?",
            [
                new Answer("Dream Coil", 0),
                new Answer("Fissure", 0),
                new Answer("Chronosphere", 0),
                new Answer("Vacuum", 1)
            ]),

        new Question("Можно ли попасть в Storm Spirit в Ball Lightning способностью Hookshot?",
            [
                new Answer("Да, он оглушится", 0),
                new Answer("Да, он не оглушится", 1),
                new Answer("Нет", 0),
            ]),

        new Question("Что произойдет, если Pudge хукнет героя, но на траектории полета находится " +
            "Aether Remnant Void Spirit'a?",
            [
                new Answer("Герой останется там, где попался на ремнант", 0),
                new Answer("Герой долетит до Pudge", 1),
            ]),

        new Question("Сможет ли Io увести героя с помощью Relocate, если союзника поместить в астрал?",
            [
                new Answer("Да", 1),
                new Answer("Нет", 0),
            ]),


    ];

const quiz = new Quiz(1, questions, results);

Update();

function Update() {
    if (quiz.current < quiz.questions.length) {
        headElem.innerHTML = quiz.questions[quiz.current].text;

        buttonsElem.innerHTML = "";

        for (let i = 0; i < quiz.questions[quiz.current].answers.length; i++) {
            let btn = document.createElement("button");
            btn.className = "button";

            btn.innerHTML = quiz.questions[quiz.current].answers[i].text;

            btn.setAttribute("index", i);

            buttonsElem.appendChild(btn);
        }

        pagesElem.innerHTML = (quiz.current + 1) + " / " + quiz.questions.length;

        Init();
    } else {
        buttonsElem.innerHTML = "";
        headElem.innerHTML = quiz.results[quiz.result].text;
        pagesElem.innerHTML = "Очки: " + quiz.score;
    }
}

function Init() {
    let btns = document.getElementsByClassName("button");

    for (let i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function (e) {
            Click(e.target.getAttribute("index"));
        });
    }
}

function Click(index) {
    let correct = quiz.Click(index);

    let btns = document.getElementsByClassName("button");

    for (let i = 0; i < btns.length; i++) {
        btns[i].className = "button button_passive";
    }

    if (quiz.type == 1) {
        if (correct >= 0) {
            btns[correct].className = "button button_correct";
        }

        if (index != correct) {
            btns[index].className = "button button_wrong";
        }
    } else {
        btns[index].className = "button button_correct";
    }

    setTimeout(Update, 1000);
}