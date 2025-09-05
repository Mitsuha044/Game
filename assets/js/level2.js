const base_url = document.body.getAttribute('data-base-url') || '';

const questions = [
    {
        image: base_url + "assets/img/tofu.png",
        question: "Berapa total energi dari 2 potong tahu (masing-masing 72 kkal)?",
        answers: [
            { text: "120 kkal", correct: false },
            { text: "144 kkal", correct: true },
            { text: "160 kkal", correct: false },
            { text: "130 kkal", correct: false }
        ]
    },
    {
        image: base_url + "assets/img/fish.png",
        question: "Berapa kandungan protein pada ikan tersebut?",
        answers: [
            { text: "20 gram", correct: true },
            { text: "46 gram", correct: false },
            { text: "99 gram", correct: false },
            { text: "14 gram", correct: false }
        ]
    },
    {
        image: base_url + "assets/img/fried-egg.png",
        question: "Berapa jumlah kalori pada telur tersebut?",
        answers: [
            { text: "44 Kalori", correct: false },
            { text: "242 Kalori", correct: false },
            { text: "155 Kalori", correct: true },
            { text: "23 Kalori", correct: false }
        ]
    },
    {
        image: base_url + "assets/img/chicken-leg.png",
        question: "Berapa kandungan protein pada daging ayam?",
        answers: [
            { text: "27 Gram", correct: true },
            { text: "155 Gram", correct: false },
            { text: "13 Gram", correct: false },
            { text: "76 Gram", correct: false }
        ]
    },
    {
        image: base_url + "assets/img/Sapi-removebg-preview.png",
        question: "Berapa Kandungan protein pada daging sapi?",
        answers: [
            { text: "26 Gram", correct: true },
            { text: "33 Gram", correct: false },
            { text: "250 Gram", correct: false },
            { text: "144 Gram", correct: false }
        ]
    }
];

const questionImage = document.getElementById("question-image");
const questionText = document.getElementById("question-text");
const answerButtons = document.getElementById("answer-buttons");
const nextButton = document.getElementById("next-btn");

const correctSound = document.getElementById("correctSound");
const wrongSound = document.getElementById("wrongSound");
const clickSound = document.getElementById("clickSound");

let currentQuestionIndex = 0;
let correctCount = 0;

function startQuiz() {
    currentQuestionIndex = 0;
    correctCount = 0;
    shuffle(questions); // Mengacak urutan soal
    showQuestion();
}

function showQuestion() {
    resetState();
    const currentQuestion = questions[currentQuestionIndex];
    questionImage.src = currentQuestion.image;
    questionText.innerText = currentQuestion.question;

    // Acak jawaban
    shuffle(currentQuestion.answers);

    currentQuestion.answers.forEach(answer => {
        const button = document.createElement("button");
        button.innerText = answer.text;
        button.className = "btn btn-outline-primary mb-2 w-100 text-start";
        if (answer.correct) button.dataset.correct = true;
        button.addEventListener("click", selectAnswer);
        answerButtons.appendChild(button);
    });
}

function resetState() {
    nextButton.classList.add("d-none");
    while (answerButtons.firstChild) {
        answerButtons.removeChild(answerButtons.firstChild);
    }
}

function selectAnswer(e) {
    const selectedBtn = e.target;
    const isCorrect = selectedBtn.dataset.correct === "true";

    if (isCorrect) {
        selectedBtn.classList.replace("btn-outline-primary", "btn-success");
        correctCount++;
        correctSound.play();
    } else {
        selectedBtn.classList.replace("btn-outline-primary", "btn-danger");
        wrongSound.play();
    }

    Array.from(answerButtons.children).forEach(btn => {
        if (btn.dataset.correct === "true") {
            btn.classList.replace("btn-outline-primary", "btn-success");
        }
        btn.disabled = true;
    });

    nextButton.classList.remove("d-none");
}

nextButton.addEventListener("click", () => {
    clickSound.play();
    currentQuestionIndex++;

    if (currentQuestionIndex < questions.length) {
        showQuestion();
    } else {
        const totalQuestions = questions.length;
        const score = (correctCount / totalQuestions) * 100;
        const wrongCount = totalQuestions - correctCount;

        // Kirim data ke server pakai fetch POST
        fetch(base_url + 'level2/selesai', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `nilai=${score}&benar=${correctCount}&salah=${wrongCount}`
        }).then(() => {
            // Setelah submit, langsung redirect ke menu
            alert('level2! selesai');
            window.location.href = base_url + 'menu';
        });
    }
});

function shuffle(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

startQuiz();
