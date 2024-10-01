import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Alpine.start();

// 診断くん
// Alpine.start() の前にリスナーを実装
document.addEventListener("alpine:init", () => {
    Alpine.data("diagnosis", () => ({
        step: "start",
        answers: [],
        result: "",

        startDiagnosis() {
            this.step = "q1";
        },

        restartDiagnosis() {
            this.answers = [];
            this.handleStep("start");
        },

        answerQuestion(answer) {
            this.answers.push(answer);

            if (this.step === "q1") {
                this.handleStep("q2");
            } else if (this.step === "q2") {
                this.handleStep("q3");
            } else if (this.step === "q3") {
                this.showResult();
            }
        },

        handleStep(toStep) {
            this.step = toStep;
        },

        previousStep() {
            if (this.answers.length > 0) {
                this.answers.pop();
            }

            if (this.step === "q2") {
                this.handleStep("q1");
            } else if (this.step === "q3") {
                this.handleStep("q2");
            } else if (this.step === "q1") {
                this.handleStep("start");
            }
        },

        showResult() {
            this.step = "processing";
            setTimeout(() => {
                this.result = this.calculateResult();
                this.handleStep("result");
            }, 1000);
        },

        calculateResult() {
            const imgPath =
            "https://www.keishicho.metro.tokyo.lg.jp/images/h1_cha.png";
            const pattern = this.answers.join("→");
            switch (pattern) {
                case "A→A→A":
                    return {
                    type: "活発元気系な",
                    name: "naganoma",
                    img: imgPath
                    };
                case "A→B→B":
                    return {
                    type: "現実主義者",
                    name: "ピーポくん",
                    img: imgPath
                    };
                case "A→A→B":
                    return {
                    type: "自分大好き",
                    name: "ピーポくん",
                    img: imgPath
                    };
                case "A→B→A":
                    return {
                    type: "隠れ情熱系",
                    name: "ピーポくん",
                    img: imgPath
                    };
                case "B→B→B":
                    return {
                    type: "オカルト大好き",
                    name: "ピーポくん",
                    img: imgPath
                    };
                case "B→A→A":
                    return {
                    type: "純情少年系",
                    name: "ピーポくん",
                    img: imgPath
                    };
                case "B→A→B":
                    return {
                    type: "野心高めな",
                    name: "ピーポくん",
                    img: imgPath
                    };
                case "B→B→A":
                    return {
                    type: "犬系彼氏",
                    name: "ピーポくん",
                    img: imgPath
                    };
                default:
                    return {
                    type: "その他",
                    name: "診断結果なし",
                    img: imgPath
                    };
            }
        }
    }));
});

Alpine.start();
