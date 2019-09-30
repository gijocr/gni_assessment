import styled from 'styled-components';

export const ContentBar = styled.div`
  padding: 3px 0;
  border-top: 2px solid #ccc;
  border-bottom: 2px solid #ccc;
`;

export const Bar = styled.div`
  background: green;
  width: ${props => props.percent}%;
  height: 35px;
`;
