import React, { Component } from 'react';
import { bindActionCreators } from 'redux';
import { connect } from 'react-redux';

// Api
import { storeAnswer, getQuestionByPageType, getPageType } from '../services/api';

// Actions
import * as AsnwerActions from '../store/actions/asnwer';
import * as PageActions from '../store/actions/page';
import * as QuestionActions from '../store/actions/question';

// Components
import {
  Container,
  Asnwers,
  Asnwer,
  Button,
} from '../styles/components/Question';

class Question extends Component {
  constructor(props) {
    super(props);

    this.state = {
      activeRadio: false,
      newQuestion: {
        session_id: null,
      },
    };

    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
    this.getPreviousQuestion = this.getPreviousQuestion.bind(this);
    this.getNextQuestion = this.getNextQuestion.bind(this);
  }

  componentDidMount() {
    const session_id = window.$('meta[name="ss"]').attr('content');

    this.setState({ newQuestion: { session_id } });
  }

  async getPreviousQuestion() {
    const {
      page,
      page: { page_type: pageType },
      question,
      setQuestion,
      removeQuestion,
      setPage,
    } = this.props;

    if (question.order > 0) {
      const previousOrder = question.order - 1;
      const result = await getQuestionByPageType(previousOrder, pageType.order);
      const { question: newQuestion, hasNext } = result.data;
      setQuestion(newQuestion, hasNext);
    } else if (page.order > 0) {
      const previousPage = page.order - 1;
      const result = await getPageType(previousPage, pageType.order);

      const { page: newPage, ...rest } = result.data;
      setPage(newPage, rest);
      removeQuestion();
    } else {
      removeQuestion();
    }
  };

  async getNextQuestion() {
    const {
      page: { page_type: pageType },
      question,
      setQuestion,
      getNextPage,
      renderResult,
    } = this.props;
    let result = null;

    if (question.hasNext) {
      const nextQuestion = question.order + 1;
      result = await getQuestionByPageType(nextQuestion, pageType.order);

      const { question: newQuestion, hasNext } = result.data;
      setQuestion(newQuestion, hasNext);
    } else if (page.hasResultText) {
      renderResult();
    } else {
      getNextPage();
    }
  }

  handleChange(e) {
    const { value } = e.target;

    const { question } = this.props;

    this.setState(prevState => ({
      activeRadio: value,
      newQuestion: {
        ...prevState.newQuestion,
        question_id: question.id,
        asnwer_id: value,
      },
    }));
  }

  async handleSubmit() {
    const { newQuestion, activeRadio } = this.state;

    if (activeRadio) {
      await storeAnswer(newQuestion);
      this.getNextQuestion();

      this.setState({
        activeRadio: false,
      });
    }
  }

  render() {
    const { activeRadio } = this.state;
    const {
      config,
      page: { page_type: pageType },
      question,
      question: {
        question_type: questionType,
        question_type: { answers },
      },
    } = this.props;

    return (
      <Container>
        <h1 className="title">{questionType.title}</h1>

        <div className="description">
          <p dangerouslySetInnerHTML={{ __html: question.description }} />
        </div>

        <div className="row">
          <div className="col-sm-9 col-md-7 col-lg-6">
            <form>
              <Asnwers>
                {answers.map(asnwer => {
                  const classList = ['box'];

                  if (asnwer.id == activeRadio) {
                    classList.push('active');
                  }

                  return (
                    <Asnwer key={asnwer.order}>
                      <div className={classList.join(' ')}>
                        <label htmlFor={asnwer.id}>
                          {asnwer.order + 1}
                          <input
                            type="radio"
                            name="answer_id"
                            id={asnwer.id}
                            value={asnwer.id}
                            onChange={this.handleChange}
                          />
                        </label>
                      </div>
                      <small>{asnwer.title}</small>
                    </Asnwer>
                  );
                })}
              </Asnwers>
            </form>
          </div>
        </div>

        <button
          type="button"
          className="btn btn-outline-white mr-2"
          onClick={this.getPreviousQuestion}
        >
          <strong>{config.previous_button_text}</strong>
        </button>
        <Button
          activeRadio={activeRadio}
          type="button"
          className="btn btn-white"
          color={pageType.body_color}
          onClick={this.handleSubmit}
        >
          <strong>{config.next_button_text}</strong>
        </Button>
      </Container>
    );
  }
}

const mapStateToProps = state => ({
  config: state.config,
  page: state.page,
  question: state.question,
});

const mapDispatchToProps = dispatch =>
  bindActionCreators({ ...AsnwerActions, ...QuestionActions, ...PageActions }, dispatch);

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(Question);
