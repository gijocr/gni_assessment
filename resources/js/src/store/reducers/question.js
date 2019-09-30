const INITIAL_STATE = { hasNext: false };

export default function question(state = INITIAL_STATE, action) {
  switch (action.type) {
    case 'SET_QUESTION':
      return {
        ...state,
        ...{
          hasNext: action.payload.hasNext,
          ...action.payload.question,
        },
      };

    case 'REMOVE_QUESTION':
      return INITIAL_STATE;

    default:
      return state;
  }
}
