import React, { Component } from 'react';

// Api
import { storeAnswer } from '../services/api';

// Components
import { Container, Asnwers, Asnwer } from '../styles/components/Question';

export default class Question extends Component {
  constructor(props) {
    super(props);

    this.state = {
      answer_id: null,
      session_id: null,
    };

    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  componentDidMount() {
    const session_id = window.$('meta[name="ss"]').attr('content');

    this.setState({ session_id });
  }

  handleChange(e) {
    const { value } = e.target;

    this.setState(
      {
        answer_id: value,
      },
      this.handleSubmit
    );
  }

  async handleSubmit() {
    const { answer_id, session_id } = this.state;
    const { id } = this.props;

    await storeAnswer({ question_id: id, answer_id, session_id });
  }

  render() {
    const { title, description, asnwers } = this.props;

    return (
      <Container>
        <h1 className="title">{title}</h1>

        <div className="description">
          <p>{description}</p>
        </div>

        <div className="row">
          <div className="col-sm-9 col-md-7 col-lg-6">
            <form>
              <Asnwers>
                {asnwers.map(asnwer => (
                  <Asnwer key={asnwer.order}>
                    <div className="box">
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
                ))}
              </Asnwers>
            </form>
          </div>
        </div>
      </Container>
    );
  }
}
