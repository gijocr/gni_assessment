import { createGlobalStyle } from 'styled-components';

export const GlobalStyle = createGlobalStyle`
  body {
    font-family: 'Nunito', sans-serif;

    p {
      font-size: 1.35rem;
    }

    .btn {
      padding: 0.375rem 1.35rem;
      border-radius: 6px;

      &.btn-default {
        background-color: #fff;
      }

      &.btn-white {
        color: ${props => props.color};
        background-color: rgba(255, 255, 255, 0.5);
      }

      &.btn-outline-white {
        color: #fff;
        border-color: #fff;
      }

      &.btn-white,
      &.btn-outline-white {
        font-size: 14px;
        font-weight: 400;
        min-width: 150px;
      }
    }
  }
`;
