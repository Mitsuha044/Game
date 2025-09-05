const base_url = document.body.getAttribute("data-base-url") || "";

const questions = [
    {
        images: [
            { src: base_url + "assets/img/milk.png", correct: true, name: "Susu" },// 1
            { src: base_url + "assets/img/cabbage.png", correct: true, name: "Kol" }, // 2
            { src: base_url + "assets/img/coklat.jpg", correct: false, name: "Coklat" },// 3
            { src: base_url + "assets/img/buah.png", correct: true, name: "Buah" }, // 4
            { src: base_url + "assets/img/eskrim.png", correct: false, name: "Es Krim" }, //5
            { src: base_url + "assets/img/nasi.jpg", correct: true, name: "Nasi" }, // 6
            { src: base_url + "assets/img/kue.jpg", correct: false, name: "Kue" },// 7
            { src: base_url + "assets/img/minuman.jpg", correct: false, name: "Minuman" }, // 8
            { src: base_url + "assets/img/ciki.png", correct: false, name: "Ciki" }, // 9
            { src: base_url + "assets/img/fish.png", correct: true, name: "Ikan" } // 10
        ],
        question: "Manakah gambar yang termasuk 4 Sehat 5 Sempurna?",
        answers: [
            { text: "1, 2, 4, 6, 10", correct: true },   // contoh acak
            { text: "2, 6, 8, 9, 10", correct: false },
            { text: "1, 2, 3, 9, 10", correct: false },
            { text: "4, 5, 6, 8, 9", correct: false }
        ]
    }
];

let score = 0;
let benar = 0;
let salah = 0;
let currentQuestionIndex = 0;

const questionText = document.getElementById("question-text");
const imageContainer = document.getElementById("question-images");
const answerButtons = document.getElementById("answer-buttons");
const nextButton = document.getElementById("next-btn");

// hidden form inputs
const form = document.getElementById("form-selesai");
const inputNilai = document.getElementById("input-nilai");
const inputBenar = document.getElementById("input-benar");
const inputSalah = document.getElementById("input-salah");

// audio
const correctSound = document.getElementById("correctSound");
const wrongSound = document.getElementById("wrongSound");
const clickSound = document.getElementById("clickSound");

function startQuiz() {
    score = 0;
    benar = 0;
    salah = 0;
    currentQuestionIndex = 0;
    showQuestion();
}

// Fungsi untuk mengacak array (Fisher-Yates shuffle)
function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

function showQuestion() {
    resetState();
    let currentQuestion = questions[currentQuestionIndex];
    questionText.innerText = currentQuestion.question;

    // tampilkan gambar + label (urut tetap)
    currentQuestion.images.forEach((img, index) => {
        const div = document.createElement("div");
        div.classList.add("col-6", "col-md-3", "text-center", "mb-3");
        div.innerHTML = `
            <img src="${img.src}" class="img-fluid rounded shadow-sm" alt="${img.name}" style="max-height:120px; object-fit:contain;">
            <div class="mt-2 fw-bold">${index + 1}. ${img.name}</div>
        `;
        imageContainer.appendChild(div);
    });

    // acak jawaban sebelum ditampilkan
    const shuffledAnswers = shuffleArray([...currentQuestion.answers]);

    // tampilkan tombol jawaban
    shuffledAnswers.forEach(answer => {
        const button = document.createElement("button");
        button.innerText = answer.text;
        button.classList.add("btn", "btn-outline-primary", "w-100", "mb-2");
        button.dataset.correct = answer.correct;
        button.addEventListener("click", selectAnswer);
        answerButtons.appendChild(button);
    });
}


function resetState() {
    nextButton.classList.add("d-none");
    answerButtons.innerHTML = "";
    imageContainer.innerHTML = "";
}

function selectAnswer(e) {
    const selectedBtn = e.target;
    const isCorrect = selectedBtn.dataset.correct === "true";

    Array.from(answerButtons.children).forEach(btn => {
        btn.disabled = true;
    });

    if (isCorrect) {
        selectedBtn.classList.replace("btn-outline-primary", "btn-success");
        score += 100;
        benar++;
        if (correctSound) correctSound.play();
    } else {
        selectedBtn.classList.replace("btn-outline-primary", "btn-danger");
        const correctBtn = Array.from(answerButtons.children).find(btn => btn.dataset.correct === "true");
        if (correctBtn) {
            correctBtn.classList.replace("btn-outline-primary", "btn-success");
        }
        salah++;
        if (wrongSound) wrongSound.play();
    }

    nextButton.classList.remove("d-none");

    if (currentQuestionIndex < questions.length - 1) {
        nextButton.innerText = "Berikutnya";
    } else {
        nextButton.innerText = "Selesai";
    }
}

nextButton.addEventListener("click", () => {
    if (clickSound) clickSound.play();

    if (currentQuestionIndex < questions.length - 1) {
        currentQuestionIndex++;
        showQuestion();
    } else {
        // isi hidden input
        inputNilai.value = score;
        inputBenar.value = benar;
        inputSalah.value = salah;

        // submit form ke controller
        form.submit();
    }
});

startQuiz();
