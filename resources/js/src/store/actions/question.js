export const setQuestion = (question, hasNext) => ({
  type: 'SET_QUESTION',
  payload: { question, hasNext },
});

export const removeQuestion = () => ({
  type: 'REMOVE_QUESTION',
});
