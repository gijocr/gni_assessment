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
    }
  }
`;
