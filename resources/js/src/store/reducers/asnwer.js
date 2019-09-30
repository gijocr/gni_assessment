const INITIAL_STATE = { question_id: null, asnwer_id: null, session_id: null };

export default function asnwer(state = INITIAL_STATE, action) {
  switch (action.type) {
    case 'SET_ASNWER':
      return { ...state, ...action.payload };

    default:
      return state;
  }
}
