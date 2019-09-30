import React from 'react';
import { bindActionCreators } from 'redux';
import { connect } from 'react-redux';

// Api
import { getPageType, getQuestionByPageType } from '../services/api';

// Actions
import * as PageActions from '../store/actions/page';
import * as QuestionActions from '../store/actions/question';
import * as AsnwerActions from '../store/actions/asnwer';

// Components
import Question from './Question';
import Graphic from './Graphic';

// Styles
import { Container } from '../styles/components/Body';

const Body = props => {
  const {
    page,
    page: { page_type: pageType },
    question,
    hasFooter,
    setPage,
    setQuestion,
  } = props;
  console.log(props);

  const classList = {
    flexAlign: hasFooter ? 'center' : 'flex-start',
  };

  const getNextPageType = async () => {
    const nextType = pageType.order + 1;
    const result = await getPageType(0, nextType);

    const { page: newPage, ...rest } = result.data;
    setPage(newPage, rest);
  };

  const getNextPage = async () => {
    if (page.hasNext) {
      const nextPage = page.order + 1;
      const result = await getPageType(nextPage, pageType.order);

      const { page: newPage, ...rest } = result.data;
      setPage(newPage, rest);
    } else {
      getNextPageType();
    }
  };

  const getNextQuestion = async () => {
    let result = null;

    if (page.hasQuestion && !question.id) {
      result = await getQuestionByPageType(0, pageType.order);
    } else if (question.id) {
      const nextQuestion = question.order + 1;
      result = await getQuestionByPageType(nextQuestion, pageType.order);
    }

    if (result) {
      const { question: newQuestion, hasNext } = result.data;
      setQuestion(newQuestion, hasNext);
    }
  };

  const renderQuestion = () => {
    return <Question getNextPage={getNextPage} />;
  };

  const renderResult = () => {
    return <Graphic className="mb-2" percent="80" />;
  };

  const render = () => {
    if (question.id && page.hasQuestion) {
      return renderQuestion();
    }

    // if (page.hasResultText) {
    //   return renderResult();
    // }

    return (
      <>
        <h1 className="title">{page.title}</h1>
        <div className="description">
          <p dangerouslySetInnerHTML={{ __html: page.description }} />
        </div>
        <button
          type="button"
          className="btn btn-default"
          onClick={page.hasQuestion ? getNextQuestion : getNextPage}
          // onClick={getNextPage}
        >
          <strong>{page.button_label}</strong>
        </button>
      </>
    );
  };

  return (
    <Container backgroundColor={pageType.body_color} classList={classList}>
      <div className="container">
        <div className="row">
          <div className="col-md-9">{render()}</div>
        </div>
      </div>
    </Container>
  );
};

const mapStateToProps = state => ({
  page: state.page,
  config: state.config,
  question: state.question,
  // asnwer: state.asnwer,
});

const mapDispatchToProps = dispatch =>
  bindActionCreators({ ...PageActions, ...QuestionActions }, dispatch);

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(Body);
