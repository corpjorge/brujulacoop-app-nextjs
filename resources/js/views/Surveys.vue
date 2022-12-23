<template>
    <section class="survey-content">
        <div class="container">
            <div class="row">
                <div
                    class="col-md-5 d-flex justify-content-center align-items-center"
                >
                    <img
                        src="/assets/img/concurso/login.png"
                        alt=""
                        class="w-100"
                    />
                </div>
                <div class="col-md-7 content-questions">
                    <div class="preloader" v-if="loading || !survey">
                        <div class="loader">
                            <div class="spinner">
                                <div class="spinner-container">
                                    <div class="spinner-rotator">
                                        <div class="spinner-left">
                                            <div class="spinner-circle"></div>
                                        </div>
                                        <div class="spinner-right">
                                            <div class="spinner-circle"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="container-questions pt-4"
                        v-if="!loading && survey"
                    >
                        <div
                            class="about-content-wrapper"
                            v-if="!showQuestions"
                        >
                            <div class="section-title">
                                <h3 class="text-center">{{ survey.name }}</h3>
                                <p>{{ survey.description }}</p>
                            </div>
                            <div class="signup-button">
                                <button
                                    v-if="survey.attempts > participation"
                                    class="button button-lg mt-3 radius-10 btn-block"
                                    @click="surveyStart"
                                >
                                    Ir a la encuesta
                                </button>
                                <div
                                    v-else
                                    class="button button-lg mt-3 radius-10 btn-block"
                                >
                                    Lo sentimos, ya participaste
                                </div>
                            </div>
                        </div>
                        <div class="about-content-wrapper" v-else>
                            <h4 class="mb-2">{{ survey.name }}</h4>
                            <form id="survey-form">
                                <template
                                    v-for="(question,
                                    index) in survey.questions"
                                >
                                    <div
                                        :class="
                                            'row-question ' +
                                                (question.option_id
                                                    ? 'hidden'
                                                    : '')
                                        "
                                        :id="'question-' + question.id"
                                    >
                                        <p class="question">
                                            {{ question.question }}
                                        </p>
                                        <div
                                            v-if="
                                                question.type === 1 ||
                                                    question.type === 3
                                            "
                                        >
                                            <template
                                                v-for="option in question.options"
                                            >
                                                <div class="option">
                                                    <input
                                                        :id="
                                                            'radio-' + option.id
                                                        "
                                                        :type="
                                                            question.type === 3
                                                                ? 'radio'
                                                                : 'checkbox'
                                                        "
                                                        :name="question.id"
                                                        :value="option.response"
                                                        @change="
                                                            onChange(
                                                                index,
                                                                question,
                                                                option
                                                            )
                                                        "
                                                    />
                                                    <label
                                                        :for="
                                                            'radio-' + option.id
                                                        "
                                                    >
                                                        {{ option.response }}
                                                    </label>
                                                </div>
                                            </template>
                                        </div>
                                        <div v-if="question.type === 2">
                                            <textarea
                                                :name="question.id"
                                                rows="4"
                                                class="form-control"
                                                @input="
                                                    e => onChangeText(e, index)
                                                "
                                            ></textarea>
                                        </div>
                                    </div>
                                </template>
                                <button
                                    class="button button-lg radius-10 btn-block"
                                    @click="onSubmit"
                                >
                                    Enviar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import axios from "axios";
import { isProxy, toRaw } from "vue";

export default {
    name: "Surveys",
    data() {
        return {
            loading: true,
            survey: null,
            participation: 0,
            responses: [],
            showQuestions: false
        };
    },
    created() {
        this.getSurveys();
    },
    methods: {
        getSurveys() {
            axios.get("/surveys/first-active").then(response => {
                const {
                    data: { participation, survey }
                } = response;
                this.loading = false;
                this.participation = participation;
                this.survey = survey;
            });
        },
        surveyStart() {
            this.showQuestions = true;
        },
        onChange(index, questionSelected, option) {
            const itsConditional = questionSelected.options.filter(
                item => item.its_conditional
            );

            console.log(questionSelected.id);
            console.log(index);
            console.log(option);

            let responses = [];

            if (questionSelected.type === 1) {
                let questionIsAdded = this.responses.find(
                    question =>
                        question &&
                        questionSelected &&
                        question.id === questionSelected.id
                );
                console.log(questionIsAdded);
                if (questionIsAdded && isProxy(questionIsAdded)) {
                    questionIsAdded = toRaw(questionIsAdded);
                    responses = questionIsAdded.responses;
                }

                let ifAdded = responses.find(item => item.id === option.id);

                if (ifAdded) {
                    responses = responses.filter(item => item.id !== option.id);
                } else {
                    responses.push({
                        id: option.id,
                        response: option.response
                    });
                }
                itsConditional.forEach(item => {
                    if (item.id === option.id && !ifAdded) {
                        this.onRemoveClassList(
                            `question-${item.question_id}`,
                            "hidden"
                        );
                    } else if (ifAdded) {
                        this.onAddClassList(
                            `question-${item.question_id}`,
                            "hidden"
                        );
                    }
                });
            }
            if (questionSelected.type === 3) {
                responses = [{ id: option.id, response: option.response }];
                itsConditional.forEach(item => {
                    if (item.id === option.id) {
                        this.onRemoveClassList(
                            `question-${item.question_id}`,
                            "hidden"
                        );
                    } else {
                        this.onAddClassList(
                            `question-${item.question_id}`,
                            "hidden"
                        );
                    }
                });
            }

            const question = {
                id: questionSelected.id,
                question: questionSelected.question,
                option_id: questionSelected.option_id,
                responses
            };

            this.responses[index] = question;
        },
        onRemoveClassList(id, className) {
            document.getElementById(id).classList.remove(className);
        },
        onAddClassList(id, className) {
            document.getElementById(id).classList.add(className);
        },
        onChangeText(e, index) {
            const questionSelected = this.survey.questions[index];
            const question = {
                id: questionSelected.id,
                question: questionSelected.question,
                option_id: questionSelected.option_id,
                response: e.target.value
            };
            this.responses[index] = question;
        },
        async onSubmit(e) {
            e.preventDefault();
            const minResponses = this.survey.questions.filter(
                item => !item.option_id
            );
            const responses = this.responses.filter(item => !item.option_id);

            if (responses.length >= minResponses.length) {
                const dataResponses = this.responses.filter(item => item);
                await axios.post(`/surveys/${this.survey.id}`, {
                    responses: dataResponses
                });
                window.location.assign("/slots");
            } else {
                alert(
                    "Debes contestar todas las preguntas para poder participar."
                );
            }
        }
    }
};
</script>

<style scoped>
.survey-content {
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
}
.survey-content .container,
.survey-content .row,
.container-questions {
    height: 100%;
}
.container-questions .about-content-wrapper {
    max-height: 600px;
    overflow-y: auto;
}
.survey-content .preloader {
    position: absolute;
    top: 0;
    left: 0;
}
.content-questions {
    position: relative;
}
.row-question {
    border-bottom: 1px solid #ced4da;
    padding: 0 20px 20px;
    margin-bottom: 20px;
}
.question {
    font-weight: 700;
}
.option {
    display: flex;
    justify-content: flex-start;
    align-items: center;
}
.option input {
    display: none;
}
.option label {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    padding: 10px;
    border-radius: 10px;
    margin-bottom: 5px;
    border: 2px solid #ced4da;
}
.option input[type="radio"]:checked + label,
.option input[type="checkbox"]:checked + label {
    border: 2px solid #0086db;
}
.row-question.hidden {
    display: none;
}
</style>
