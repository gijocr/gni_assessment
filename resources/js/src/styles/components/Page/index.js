import styled from 'styled-components';

export const Content = styled.div`
  height: 100vh;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  background-color: ${props => props.backgroundColor};
`;
