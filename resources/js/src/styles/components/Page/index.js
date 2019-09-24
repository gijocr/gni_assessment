import styled from 'styled-components';

export const Content = styled.div`
  height: 100vh;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  background-color: ${props => props.backgroundColor};
  color: #fff;

  .title {
    font-weight: 700;
  }

  .description {
    p {
      &:not(:last-of-type) {
        margin-bottom: 1.5rem;
      }

      &:last-of-type {
        margin: 0;
      }
    }
  }

  .title,
  .description {
    margin-bottom: 2.25rem;
  }

  .btn {
    color: ${props => props.backgroundColor};
  }
`;
