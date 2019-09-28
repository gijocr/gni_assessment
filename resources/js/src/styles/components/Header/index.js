import styled from 'styled-components';

export const Container = styled.div`
  flex: 1;
  align-self: flex-start;
  background-color: ${props => props.backgroundColor};
  padding: 1rem 0;

  img {
    height: 65px;
    width: auto;
  }
`;
