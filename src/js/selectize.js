jQuery("#tools-tags").selectize({
  delimiter: ",",
  persist: false,
  options: tools.map((tool) => ({ text: tool.name, value: tool.name })),
  openOnFocus: false,
  closeAfterSelect: true,
  create: function (input) {
    return {
      value: input,
      text: input,
    };
  },
});

var languagesSelectize = jQuery("#languages-tags").selectize({
  delimiter: ",",
  persist: false,
  options: languages.map((skill) => ({ text: skill.name, value: skill.name })),
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





