jQuery("#tools-tags").selectize({
  delimiter: ",",
  persist: false,
  create: function (input) {
    return {
      value: input,
      text: input,
    };
  },
});

var skillsSelectize = jQuery("#skills-tags").selectize({
  delimiter: ",",
  persist: false,
  options: skills.map((skill) => ({ text: skill.name, value: skill.name })),
  openOnFocus: false,
  closeAfterSelect: true,
  placeholder: "Php,Javascript",
  create: function (input) {
    return {
      value: input,
      text: input,
    };
  },
});





