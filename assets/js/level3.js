const base_url = document.body.getAttribute('data-base-url') || '';

const questions = [
    {
        image: base_url + "assets/img/broccoli.png",
        question: "Brokoli mencegah apa?",
        answers: [
            { text: "Sakit kepala", correct: false },
            { text: "Kekurangan vitamin dan penyakit tertentu", correct: true },
            { text: "Luka Gores", correct: false },
            { text: "Flu biasa", correct: false }
        ]
    },
    {
        image: base_url + "assets/img/milk.png",
        question: "Selain energi, susu juga mengandung kalsium yang berfungsi untuk?",
        answers: [
            { text: "Menambah lemak tubuh", correct: false },
            { text: "Mengurangi nafsu makan", correct: false },
            { text: "Meningkatkan tekanan darah", correct: false },
            { text: "Membangun tulang dan gigi yang kuat", correct: true }
        ]
    },
    {
        image: base_url + "assets/img/fish.png",
        question: "BIkan mengandung omega-3 yang bermanfaat untuk apa?",
        answers: [
            { text: "Membuat tubuh cepat lelah", correct: false },
            { text: "Menghambat kecerdasan otak", correct: false },
            { text: "Membantu kecerdasan otak", correct: true },
            { text: "Menyebabkan rasa ngantuk", correct: false }
        ]
    },
    {
        image: base_url + "assets/img/tempe.png",
        question: "Tempe kaya protein, manfaat utamanya adalah?",
        answers: [
            { text: "Menjaga daya tahan tubuh", correct: true },
            { text: "Menyebabkan obesitas", correct: false },
            { text: "Membuat kulit menjadi kering", correct: false },
            { text: "Mengurangi rasa haus", correct: false }
        ]
    },
    {
        image: base_url + "assets/img/Sapi-removebg-preview.png",
        question: "Mengapa daging sapi penting bagi anak-anak?",
        answers: [
            { text: "Memberikan energi dan zat besi", correct: true },
            { text: "Menyebabkan ngantuk", correct: false },
            { text: "Bikin sakit perut", correct: false },
            { text: "Tidak ada manfaat", correct: false }
        ]
    }
];

// DOM elements
const questionImage = document.getElementById("question-image");
const questionText = document.getElementById("question-text");
const answerButtons = document.getElementById("answer-buttons");
const nextButton = document.getElementById("next-btn");

// Audio
const correctSound = document.getElementById("correctSound");
const wrongSound = document.getElementById("wrongSound");
const clickSound = document.getElementById("clickSound");

// Form untuk kirim nilai
const formSelesai = document.getElementById("form-selesai");
const inputNilai = document.getElementById("input-nilai");
const inputBenar = document.getElementById("input-benar");
const inputSalah = document.getElementById("input-salah");

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
        // Kirim ke backend
        const total = questions.length;
        const nilai = (correctCount / total) * 100;
        const salah = total - correctCount;

        inputNilai.value = Math.round(nilai);
        inputBenar.value = correctCount;
        inputSalah.value = salah;

        formSelesai.submit(); // Redirect ke controller dan lanjut ke menuK
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
