import React from 'react';
import { Link } from 'react-router-dom';

import { Container } from '../styles/components/Body';

export default function Body({ backgroundColor }) {
  return (
    <Container backgroundColor={backgroundColor}>
      <div className="container">
        <div className="row">
          <div className="col-md-9">
            <h1 className="title">
              Google News Initiative Design Accelerator Design Maturity
              Assessment
            </h1>

            <div className="description">
              <p>
                Welcome to the Design Maturity Assessment, a self-assessment
                tool put together by Echos Innovation Lab to help organizations
                understand the maturity of their digital, design and innovation
                initiatives.
              </p>

              <p>The survey will take approximately 20 minutes to complete.</p>
            </div>

            <Link to="/">
              <button type="button" className="btn btn-default">
                <strong>Begin the assessment!</strong>
              </button>
            </Link>
          </div>
        </div>
      </div>
    </Container>
  );
}
