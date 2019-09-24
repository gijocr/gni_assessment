import React from 'react';
import { Link } from 'react-router-dom';

import { Container } from '../styles/components/Body';

export default function Body({ backgroundColor }) {
  return (
    <Container backgroundColor={backgroundColor}>
      <div className="container">
        <div className="header py-5">
          <div className="row">
            <div className="col">
              <h1>
                Google News Initiative Design Accelerator Design Maturity
                Assessment
              </h1>
              <p>
                Welcome to the Design Maturity Assessment, a self-assessment
                tool put together by Echos Innovation Lab to help organizations
                understand the maturity of their digital, design and innovation
                initiatives.
              </p>

              <p>The survey will take approximately 20 minutes to complete.</p>

              <Link to="/">
                <button type="button" className="btn btn-default">
                  <strong>Begin the assessment!</strong>
                </button>
              </Link>
            </div>
          </div>
        </div>
      </div>
    </Container>
  );
}
