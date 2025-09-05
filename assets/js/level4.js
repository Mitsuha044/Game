const base_url = document.body.getAttribute('data-base-url') || '';

const questions = [
    {
        image: base_url + "assets/img/tempe.png",
        question: "Tempe 1 potong mengandung 6g protein. Jika makan 2 potong tempe, berapa total protein yang masuk?",
        answers: [
            { text: "12 gram", correct: true },
            { text: "10 gram", correct: false },
            { text: "8 gram", correct: false },
            { text: "6 gram", correct: false }
        ]
    },
    {
        image: base_url + "assets/img/milk.png",
        question: "Segelas susu mengandung 8g protein. Jika minum 3 gelas susu sehari, total protein yang masuk adalah?",
        answers: [
            { text: "24 gram", correct: true },
            { text: "20 gram", correct: false },
            { text: "16 gram", correct: false },
            { text: "18 gram", correct: false }
        ]
    },
    {
        image: base_url + "assets/img/broccoli.png",
        question: "Brokoli 1 porsi mengandung 3g serat. Jika makan 2 porsi brokoli, berapa total serat yang didapat?",
        answers: [
            { text: "6 gram", correct: true },
            { text: "4 gram", correct: false },
            { text: "5 gram", correct: false },
            { text: "3 gram", correct: false }
        ]
    },
    {
        image: base_url + "assets/img/tahu.png",
        question: "Tahu 1 potong ada 4g protein. Jika makan 5 potong tahu, total protein yang masuk?",
        answers: [
            { text: "20 gram", correct: true },
            { text: "15 gram", correct: false },
            { text: "18 gram", correct: false },
            { text: "10 gram", correct: false }
        ]
    },
    {
        image: base_url + "assets/img/fish.png",
        question: "Ikan 1 porsi ada 10g protein. Jika makan 2 porsi ikan dan 1 potong tahu (4g protein), total protein?",
        answers: [
            { text: "24 gram", correct: true },
            { text: "20 gram", correct: false },
            { text: "18 gram", correct: false },
            { text: "22 gram", correct: false }
        ]
    }
];

// DOM
const questionImage = document.getElementById("question-image");
const questionText = document.getElementById("question-text");
const answerButtons = document.getElementById("answer-buttons");
const nextButton = document.getElementById("next-btn");
const inputNilai = document.getElementById("input-nilai");
const inputBenar = document.getElementById("input-benar");
const inputSalah = document.getElementById("input-salah");

// Audio
const correctSound = document.getElementById("correctSound");
const wrongSound = document.getElementById("wrongSound");
const clickSound = document.getElementById("clickSound");

let currentQuestionIndex = 0;
let score = 0;
let benar = 0;
let salah = 0;

function startQuiz() {
    currentQuestionIndex = 0;
    score = 0;
    benar = 0;
    salah = 0;
    shuffle(questions);
    showQuestion();
}

function showQuestion() {
    resetState();
    const currentQuestion = questions[currentQuestionIndex];
    questionImage.src = currentQuestion.image;
    questionText.innerText = currentQuestion.question;

    shuffle(currentQuestion.answers);
    currentQuestion.answers.forEach(answer => {
        const button = document.createElement("button");
        button.innerText = answer.text;
        button.className = "btn btn-outline-primary mb-2 w-100 text-start";
        button.dataset.correct = answer.correct;
        button.addEventListener("click", selectAnswer);
        answerButtons.appendChild(button);
    });
}

function resetState() {
    nextButton.classList.add("d-none");
    answerButtons.innerHTML = "";
}

function selectAnswer(e) {
    const selectedBtn = e.target;
    const isCorrect = selectedBtn.dataset.correct === "true";

    // Kunci semua tombol agar tidak bisa diklik lagi
    Array.from(answerButtons.children).forEach(btn => {
        btn.disabled = true;
    });

    if (isCorrect) {
        // Jika benar: tombol terpilih jadi hijau, lainnya tetap netral
        selectedBtn.classList.replace("btn-outline-primary", "btn-success");
        score += 20; // 5 soal = 100 poin
        benar++;
        if (correctSound) correctSound.play();
    } else {
        // Jika salah: yang dipilih jadi merah
        selectedBtn.classList.replace("btn-outline-primary", "btn-danger");

        // Tunjukkan koreksi: highlight hanya jawaban yang benar jadi hijau
        const correctBtn = Array.from(answerButtons.children)
            .find(btn => btn.dataset.correct === "true");
        if (correctBtn) {
            correctBtn.classList.replace("btn-outline-primary", "btn-success");
        }

        salah++;
        if (wrongSound) wrongSound.play();
    }

    nextButton.classList.remove("d-none");
}

nextButton.addEventListener("click", () => {
    clickSound.play();
    currentQuestionIndex++;
    if (currentQuestionIndex < questions.length) {
        showQuestion();
    } else {
        inputNilai.value = score;
        inputBenar.value = benar;
        inputSalah.value = salah;
        document.getElementById("form-selesai").submit();
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
