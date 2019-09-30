export const setAsnwer = (question_id, asnwer_id, session_id) => ({
  type: 'SET_ASNWER',
  payload: { question_id, asnwer_id, session_id },
});
