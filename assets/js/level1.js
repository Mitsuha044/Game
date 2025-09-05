const base_url = document.body.getAttribute('data-base-url') || '';

const questions = [
    {
        image: base_url + "assets/img/milk.png",
        question: "Gambar apa yang ada di atas?",
        answers: [
            { text: "Susu", correct: true },
            { text: "Tempe", correct: false },
            { text: "Brokoli", correct: false },
            { text: "Telur", correct: false }
        ]
    },
    {
        image: base_url + "assets/img/tempe.png",
        question: "Gambar apa yang ada di atas?",
        answers: [
            { text: "Tempe", correct: true },
            { text: "Nasi", correct: false },
            { text: "Telur", correct: false },
            { text: "Susu", correct: false }
        ]
    },
    {
        image: base_url + "assets/img/broccoli.png",
        question: "Gambar apa yang ada di atas?",
        answers: [
            { text: "Brokoli", correct: true },
            { text: "Kubis", correct: false },
            { text: "Bayam", correct: false },
            { text: "Wortel", correct: false }
        ]
    },
    {
        image: base_url + "assets/img/fried-egg.png",
        question: "Gambar apa yang ada di atas?",
        answers: [
            { text: "Telur", correct: true },
            { text: "Tempe", correct: false },
            { text: "Susu", correct: false },
            { text: "Nasi", correct: false }
        ]
    },
    {
        image: base_url + "assets/img/tofu.png",
        question: "Gambar apa yang ada di atas?",
        answers: [
            { text: "Telur", correct: false },
            { text: "Tahu", correct: true },
            { text: "Susu", correct: false },
            { text: "Nasi", correct: false }
        ]
    }
];

// DOM Elements
const questionImage = document.getElementById("question-image");
const questionText = document.getElementById("question-text");
const answerButtons = document.getElementById("answer-buttons");
const nextButton = document.getElementById("next-btn");

// Audio
const correctSound = new Audio(base_url + "assets/mp3/benar.mp3");
const wrongSound = new Audio(base_url + "assets/mp3/salah.mp3");
const clickSound = new Audio(base_url + "assets/mp3/click.mp3");

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

    // acak jawaban
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
        // Hitung nilai 100 / jumlah soal
        const totalQuestions = questions.length;
        const score = (correctCount / totalQuestions) * 100;
        const wrongCount = totalQuestions - correctCount;

        // Kirim ke backend
        fetch(base_url + 'level1/selesai', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `nilai=${score}&benar=${correctCount}&salah=${wrongCount}`
        }).then(() => {
            alert('Level1! selesai');
            window.location.href = base_url + "menu";
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
