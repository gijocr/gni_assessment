import React from 'react';
import { bindActionCreators } from 'redux';
import { connect } from 'react-redux';

// Api
import { getPageType } from '../services/api';

// Actions
import * as PageActions from '../store/actions/pages';

// Components
import Question from './Question';

// Styles
import { Container } from '../styles/components/Body';

const Body = props => {
  const {
    configs,
    page: { title, description, button_label },
    pageType,
    pageType: { body_color, questions },
    setPage,
    pages: { pages, activePage, hasNext, activeQuestion },
  } = props;

  const getNextPageType = async () => {
    const nextType = pageType.order + 1;
    const result = await getPageType(nextType);

    setPage(result.data.pages, 0, hasNext, activeQuestion);
  };

  const getNextPage = () => {
    const nextPage = activePage + 1;

    if (pages.length > nextPage) {
      setPage(pages, nextPage, hasNext, activeQuestion);
    } else if (hasNext) {
      getNextPageType();
    }
  };

  const getNextQuestion = () => {
    if (activeQuestion === null) {
      setPage(pages, activePage, hasNext, 0);
    } else {
      const nextQuestion = activeQuestion + 1;

      if (questions.length > nextQuestion) {
        setPage(pages, activePage, hasNext, nextQuestion);
      }
    }
  };

  const getPreviousQuestion = () => {
    if (activeQuestion === 0) {
      setPage(pages, activePage, hasNext, null);
    } else {
      const previousQuestion = activeQuestion - 1;

      setPage(pages, activePage, hasNext, previousQuestion);
    }
  };

  return (
    <Container backgroundColor={body_color}>
      <div className="container">
        <div className="row">
          <div className="col-md-9">
            {activeQuestion !== null ? (
              <>
                <Question
                  title={questions[activeQuestion].question_type.title}
                  description={questions[activeQuestion].description}
                  asnwers={questions[activeQuestion].question_type.answers}
                  id={questions[activeQuestion].id}
                />

                <button
                  type="button"
                  className="btn btn-outline-white mr-2"
                  onClick={getPreviousQuestion}
                >
                  <strong>{configs.previous_button_text}</strong>
                </button>
                <button
                  type="button"
                  className="btn btn-white"
                  color={body_color}
                  onClick={getNextQuestion}
                >
                  <strong>{configs.next_button_text}</strong>
                </button>
              </>
            ) : (
              <>
                <h1 className="title">{title}</h1>

                <div className="description">
                  <p dangerouslySetInnerHTML={{ __html: description }} />
                </div>

                <button
                  type="button"
                  className="btn btn-default"
                  onClick={questions.length ? getNextQuestion : getNextPage}
                >
                  <strong>{button_label}</strong>
                </button>
              </>
            )}
          </div>
        </div>
      </div>
    </Container>
  );
};

const mapStateToProps = state => ({
  pages: state.pages,
});

const mapDispatchToProps = dispatch =>
  bindActionCreators(PageActions, dispatch);

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(Body);
