const useRules = () => {
  const nameRules = [
    (value) => {
      if (value) return true;
      return "Name is required.";
    },
    (value) => {
      if (value?.length <= 40) return true;
      return "Name must be less than 40 characters.";
    },
    (value) => {
      if (/[^0-9]/.test(value)) return true;
      return "Last name can not contain digits.";
    },
  ];

  const emailRules = [
    (value) => {
      if (value) return true;
      return "E-mail is required.";
    },
    (value) => {
      if (/.+@.+\..+/.test(value)) return true;
      return "E-mail must be valid.";
    },
  ];

  const passwordRules = [
    (value) => {
      if (/^[A-Za-z]\w{7,14}$/.test(value)) return true;
      return "At least one capital letter, one capital letter and between 7 and 14 characters.";
    },
  ];

  return {
    nameRules,
    emailRules,
    passwordRules,
  };
};

export default useRules;
