import styled from 'styled-components';

export const Container = styled.div`
  width: 100%;
  display: flex;
  align-items: ${props => props.classList.flexAlign};
  background-color: ${props => props.backgroundColor};
`;
