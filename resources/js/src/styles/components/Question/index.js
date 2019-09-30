import styled from 'styled-components';

export const Container = styled.div`
  flex: 1;
`;

export const Asnwers = styled.div`
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 3.5rem;
`;

export const Asnwer = styled.div`
  width: 50px;
  display: flex;
  flex-direction: column;
  align-items: center;

  .box {
    width: 50px;
    height: 50px;
    border: 1px solid #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 5px;
    font-weight: 500;

    &:hover,
    &.active {
      background-color: rgba(255, 255, 255, 0.5);
    }

    label {
      height: 100%;
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0;
      cursor: pointer;
    }
  }

  small {
    text-align: center;
  }

  input {
    display: none;
  }
`;

export const Button = styled.button`
  background-color: ${props => (props.activeRadio ? '#fff !important' : '')};
`;
